<?php
session_start();
if(!isset($_SESSION['current_user'])) {
    $_SESSION['index-display'] = 'login';
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<!-- main page of the website that provides access to users to send sms messages -->
<html>
    <head>
        <title>Text Alert</title>
        <link rel="stylesheet" type="text/css" href="styles/index-layout.css"/>
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="nav-bar">
            <a class="nav-link-left" href="index.php">
                Text Alert Project
            </a>
            <a class='nav-link-right' href='user_logout.php'>
                Logout
            </a>
            <a class='nav-link-right' href='account.php'>
                <?php echo $_SESSION['current_user']; ?> - Account
            </a>
        </div>
        <script>
            $(document).ready(function() {
                $('#later').click(function(e) {
                    e.preventDefault();
                    $('#later').addClass('button-toggle-highlight');
                    $('#now').removeClass('button-toggle-highlight');
                    $('.can-hide').removeClass('hide');
                    $('#when').val('later');
                });
                $('#now').click(function(e) {
                    e.preventDefault();
                    $('#later').removeClass('button-toggle-highlight');
                    $('#now').addClass('button-toggle-highlight');
                    $('.can-hide').addClass('hide');
                    $('#when').val('now');
                });
            });
        </script>
        <div class="separator-large"></div>
        <div class="title">
            <b>Send a Message</b>
        </div>
        <div class="center">
            <div class="separator"></div>
            <a id="later" class="button-toggle button-toggle-highlight" href="#">
                LATER
            </a>
            <a id="now" class="button-toggle" href="#">
                NOW
            </a>
        </div>
        <div class="separator"></div>
        <form method="post" action="send_message.php" class="center">
            <fieldset class="box">
                <h1><strong>Enter Text Alert Message:</strong></h1>
                <div class="separator-small"></div>
                <div class="container">
                    <div class="right-aligned">
                        Reciever Number:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned container">
                        <input type="text" name="receiver" value="+16142577664" readonly/>
                    </div>
                </div>
                <div class="separator-small"></div>
                <div class="container">
                    <div class="right-aligned">
                        Message:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned">
                        <textarea rows="3" cols="22" name="message" maxlength="1400" required></textarea>
                    </div>
                </div>
                <div class="separator-small"></div>
                <div class="container can-hide">
                    <div class="right-aligned">
                        Timezone:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned">
                        <strong><em>Use Timezone EST (America/New_York)</em></strong>
                    </div>
                </div>
                <div class="separator-small"></div>
                <div class="container can-hide">
                    <div class="right-aligned">
                        Month:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned">
                        <select name="month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <div class="separator-small"></div>
                <div class="container can-hide">
                    <div class="right-aligned">
                        Day:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned">
                        <select name="day">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                </div>
                <div class="separator-small"></div>
                <div class="container can-hide">
                    <div class="right-aligned">
                        Hour:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned">
                        <select name="hour">
                            <option value="0">MIDNIGHT</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">NOON</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select>
                    </div>
                </div>
                <div class="separator-small"></div>
                <div class="container can-hide">
                    <div class="right-aligned">
                        Minute:&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="left-aligned">
                        <select name="minute">
                            <option value="0">0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </div>
                </div>
                <div class="separator-small"></div>
                <select name="when" id="when" hidden>
                    <option value="later"></option>
                    <option value="now"></option>
                </select>
                <input type="submit" value="Send" class="send"/>
                <div class="separator-small"></div>
            </fieldset>
        </form>
    </body>
</html>
