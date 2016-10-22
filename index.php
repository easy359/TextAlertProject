<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Text Alert</title>
        <link rel="stylesheet" type="text/css" href="styles/index-layout.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="nav-bar">
            <a class="nav-link-left default-link" href="#">
                Text Alert Project
            </a>
            <?php
            if (isset($_SESSION['current_user'])) {
                echo "<a class='nav-link-right' href='user_logout.php'>Logout</a>";
                echo "<a class='nav-link-right' href='account.php'>" . $_SESSION['current_user'] . " - Account</a>";
            } else {
                echo "<a class='nav-link-right login-link' href='#'>Login</a>";
                echo "<a class='nav-link-right create-link' href='#'>Sign Up</a>";
            }
            ?>
        </div>
        <script>
            $(document).ready(function() {
                function show(id) {
                    $('#login').css('display', 'none');
                    $('#create').css('display', 'none');
                    $('#default').css('display', 'none');
                    if (id === 'login') {
                        $('#login').css('display', 'block');
                    } else if (id === 'create') {
                        $('#create').css('display', 'block');
                    } else {
                        $('#default').css('display', 'block');
                    }
                }

                $('.login-link').click(function(e) {
                    show('login');
                });
                $('.create-link').click(function(e) {
                    show('create');
                });
                $('.default-link').click(function(e) {
                    show('default');
                });
                <?php
                if (isset($_SESSION['current_user'])) {
                    echo "show('default');";
                } else if (isset($_SESSION['index-display'])) {
                    echo "show(" . json_encode($_SESSION['index-display']) . ");";
                } else {
                    echo "show('default');";
                }
                ?>
            });
        </script>
        <div class="content-white">
            <div id="login" class="hide">
                <div class="center">
                    <div class="title" style="color: gray;">
                        Login to your account to start sending remind messages
                        <br/>
                        <br/>
                    </div>
                    <div class="content-right">
                        <form method="post" action="response_login.php">
                            <fieldset class="form">
                                <div class="error"><?php
                                    if (isset($_SESSION['login_error'])) {
                                        echo $_SESSION['login_error'];
                                        unset($_SESSION['login_error']);
                                    }
                                    ?></div>
                                <input class="input" type="text" name="username" placeholder="Username" required/><br/>
                                <input class="input" type="password" name="password"  placeholder="Password" required/><br/>
                                <input class="submit" type="submit" name="submit" value="Login"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div id="create" class="hide">
                <div class="center">
                    <div class="title" style="color: gray;">
                        Create an account to start sending remind messages today!
                        <br/>
                        <br/>
                    </div>
                    <div class="content-right">
                        <form method="post" action="response_create.php">
                            <fieldset class="form">
                                <div class="error"><?php
                                    if (isset($_SESSION['create_error'])) {
                                        echo $_SESSION['create_error'];
                                        unset($_SESSION['create_error']);
                                    }
                                    ?></div>
                                <input class="input" type="text" name="create_name" placeholder="Username" required/><br/>
                                <input class="input" type="password" name="create_password"  placeholder="Password" required/><br/>
                                <input class="submit" type="submit" name="submit" value="Create Account"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div id="default" class="hide">
                <div class="title">
                    <b><u>Join The Text Alert Project!</u></b>
                </div>
                <div class="center">
                    <?php
                    if (isset($_SESSION['current_user'])) {
                        echo "<a class='button' href='main.php'>Send a Text</a>";
                    } else {
                        echo "<a class='button create-link' href='#'>Sign Up</a>";
                        echo "<a class='button login-link' href='#'>Login</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="content-gray">
            <div class="title">
                About Me
            </div>
            <div class="text-body">
                My name is Ian Willis and I am the author and created of the <a href="TextAlertDocumentation.html" target="_blank">Text Alert Project</a>. I was
                inspired to make this after I became the secratary of my school's volunteering club and
                had to constantly send out text messages to members to remind them when they had to volunteer.
                Rather than waking up at 7 in the morning to manually send a text message to remind people
                when they have to volunteer, I can now input any message, date, and time and the message will
                automatically send on its own.
                This project has challeneged my abilities as a programmer and has taught me about many skills
                that will be importaint moving forward in my life. I've done my best to document my progress
                and goals for this project and will provide my full documentation down below. For those of you
                who are interested, this project took over 27 weeks of on and off work to complete. I used PHP,
                HTML, CSS, jQuery, and Git to both create and assist myself in designing this program. In its
                current state, I am happy with where I have taken this program, and even though there is so
                much more I can add to it, I want to leave it where it is to reflect my original intent, only
                making styling changes to make it look more appealing.
            </div>
        </div>
        <div class="content-white">
            <div class="title">
                How To Use
            </div>
            <div class="text-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere imperdiet finibus. Ut non metus non tellus ornare dictum. Nulla vehicula, ipsum nec convallis iaculis, lorem mauris luctus lorem, in pharetra sapien est eu nisl. Aliquam auctor mauris sed dignissim interdum. Sed fringilla turpis a est cursus, quis aliquet lacus tristique. Nulla ut aliquam tellus. Nullam venenatis cursus gravida. Fusce non mauris dignissim, condimentum velit auctor, scelerisque risus. Curabitur quis enim ipsum. Duis consectetur convallis eleifend. Suspendisse quis leo ante. Praesent vel urna id leo luctus suscipit.

                Integer nec fermentum sapien, ut elementum metus. Nullam lacinia augue at odio efficitur ultricies. Maecenas convallis scelerisque hendrerit. Nullam lacus nulla, laoreet sit amet sollicitudin at, dignissim tempus lacus. Integer lacinia purus id dui tempor, at laoreet lacus egestas. Praesent a ligula pharetra, congue quam sit amet, ultrices diam. Morbi tempor ornare tortor, quis dignissim mi rhoncus in. Duis porta, quam et porta commodo, ligula lacus blandit sapien, sit amet commodo orci diam et ligula.

                Mauris et feugiat ante. mattis auctor lacus aliquet in. Vivamus pulvinar turpis non ullamcorper suscipit. Ut fermentum aliquam ante. Aenean id tempus tortor, sed pulvinar arcu.
            </div>
        </div>
    </body>
</html>
