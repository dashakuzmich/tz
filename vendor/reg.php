<?php 
 	session_start();
	require_once 'jsondb/JsonDb.php';

use JsonDb\JsonDb\JsonDb;
$optisons = [
	'compress_mode' => false,
];

$DB = new JsonDb($optisons);

$DB->table('users')->autoIncremeIntAdd('id');

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $password_confirm = $_POST['password_confirm'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $users = $DB->select( '*' )
	->from( 'users.json' )
	->get();
    print_r( $users );
 
	$error_fields = [];

    if ($login === '') {
        $error_fields[] = 'login';
    }

    if ($pass === '') {
        $error_fields[] = 'pass';
    }

    if ($password_confirm === '') {
        $error_fields[] = 'password_confirm';
    }

    if ($email === '') {
        $error_fields[] = 'email';
    }

    if ($username === '') {
        $error_fields[] = 'username';
    }

	if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность заполнения полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);
        die();
    }

  if (mb_strlen($login) < 6)
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Недопустимая длина логина",
            "fields" => ['login']
        ];
        echo json_encode($response);
        die();
    }
    
    if (!preg_match("/^(?=.*[a-zа-я])(?=.*\d)[a-zA-Zа-яА-Я\d]{6,}$/",$pass))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пароль должен состоять из букв и цифр и быть длиной не менее 6 символов",
            "fields" => ['pass']
        ];
        echo json_encode($response); 
        die();      
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Неправильно введен email",
            "fields" => ['email']
        ];
        echo json_encode($response);
        die();
    } 

	if (!preg_match("/^[a-zA-Zа-яА-Я]{2,}$/",$username))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Имя может состоять только из двух букв",
            "fields" => ['username']
        ];
        echo json_encode($response); 
        die();
    }
$searchthis = $DB->table('users')->where('', $login)->select();
$matches = array();

$handle = @fopen("../tzjson_data/users.json", "r");
if ($handle)
{
    while (!feof($handle))
    {
        $buffer = fgets($handle);
        if(strpos($buffer, $searchthis) !== FALSE)
            $matches[] = $buffer;
    }
    fclose($handle);
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой логин уже существует",
        "fields" => ['login'],
    ];

    echo json_encode($response);
    die();
}

        

	if ($pass === $password_confirm) 
    {
        $pass = md5($pass);

		$DB->table('users')->insert(
			[
				'login' => $login,
				'pass' => $pass,
				'email' => $email,
				'username' => $username
			]	
		);

       $response = [
           "status" => true, 
       ];
       echo json_encode($response);

    } else 
    {
       $response = [
           "status" => false,
           "message" => "Пароли не совпадают",
       ];
       echo json_encode($response);
    }

?>
