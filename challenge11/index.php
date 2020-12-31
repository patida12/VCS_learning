<?php
include 'file.php';
class User
{
    public $username;
    public $email;
    public $year;
    public $gender;

    function __construct($_username, $_email, $_year, $_gender)
    {
        $this->username = $_username;
        $this->email = $_email;
        $this->year = $_year;
        $this->gender = $_gender;
    }

    public function __toString()
    {
        return 'Username: ' . $this->username . '<br /> Email: ' . $this->email . '<br /> Year: ' . $this->year . '<br />Gender: ' . $this->gender . '. <br />';
    }
}

$user = new User("", "", "", "");

if (isset($_POST["form1"])) {
    $user = new User($_POST["username"], $_POST["email"], $_POST["year"], $_POST["gender"]);
}

if (isset($_POST["form2"])) {
    $object = $_POST["object"];
}

?>
<html>

<body>
    <h2>Form 1</h2>
    <form method="post" action="">
        UserName: <input type="text" name="username" value="<?php echo $user->username; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $user->email; ?>"><br>
        Year: <input type="text" name="year" value="<?php echo $user->year; ?>"><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($user->gender) && $user->gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($user->gender) && $user->gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($user->gender) && $user->gender == "other") echo "checked"; ?> value="other">Other<br>
        <input type="submit" id="form1" name="form1" value="Serialize">
    </form>

    <?php
    $serializedUser = serialize($user);
    echo "<h2>Base64 of User:</h2>";
    echo base64_encode($serializedUser);
    ?>
    <br>
    <hr>
    <br>

    <h2>Form 2</h2>
    <form method="post" action="">
        Input: <input type="text" name="object" value="<?php echo $object; ?>"><br>
        <input type="submit" id="form2" name="form2" value="Deserialize">
    </form>

    <?php
    echo "<h2>Deserialized Object:</h2>";
    echo unserialize(base64_decode($object));
    ?>

</body>

</html>