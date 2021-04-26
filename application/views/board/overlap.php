<body>
    <div>
        <div style="float: left;"><h4>도박 안되요</h4></div>
        <div style="float: right;">
            <?php
                if(isset($_SESSION['LoggedIn']))
                {
                    echo $_SESSION['LoggedIn'];
                }
                if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn']) {
                    ?>
                    <form action="/User/logout" method="POST" style="float: right;">
                        <input type="submit" value="로그아웃" name="logout" id="logout" />
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="/User/login" method="POST" style="float: right;">
                        <div>
                            <table>
                                <tr>
                                    <th>ID</th>&nbsp;<td><input name="ID" type="text" placeholder="ID를 입력해주세요"></input></td>
                                </tr>
                                <tr>
                                    <th>PW</th>&nbsp;<td><input name="PW" type="password" placeholder="비밀번호를 입력해주세요"></input></td>
                                </tr>
                            </table>
                        </div>
                        <div><input type="submit" value="로그인!"></input></div>
                    </form>
                    <?php
                }
            ?>
        </div>
    </div>
</body>