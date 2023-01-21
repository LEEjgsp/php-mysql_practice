<script>
    function check_input(){
        if(!document.member.id.value){
            alert('아이디를 입력해주세요.');
            document.member.id.focus();
            return;
        }
        if(!document.member.pass.value){
            alert('비밀번호를 입력해주세요.');
            document.member.pass.focus();
            return;
        }
        if(!document.member.pass_confirm.value){
            alert('비밀번호 확인을 입력해주세요.');
            document.member.pass_confirm.focus();
            return;
        }
        if(!document.member.name.value){
            alert('이름을 입력해주세요.');
            document.member.name.focus();
            return;
        }
        if(!document.member.email.value){
            alert('이메일을 입력해주세요.');
            document.member.email.focus();
            return;
        }
        if(document.member.pass.value != document.member.pass_confirm.value){
            alert('비밀번호가 일치하지 않습니다.');
            document.member.pass.focus();
            return;
        }
        document.member.submit();
    }
    function reset_form(){
        document.member.id.value = "";
        document.member.pass.value = "";
        document.member.pass_confirm.value = "";
        document.member.name.value = "";
        document.member.email.value = "";
    }
    function check_id(){
        window.open("id_check.php?id="+document.member.id.value);
    }
</script>

<form name="member" action="insert.php" method="post">
    <div class="join_form">
        <h2>회원 가입</h2>
        <ul>
            <li>
                <span class="col1">아이디</span>
                <span class="col2"><input type="text" name="id"></span>
                <span class="col3"><button type="button" onclick="check_id()">중복체크</button></span>
            </li>
            <li>
                <span class="col1">비밀번호</span>
                <span class="col2"><input type="password" name="pass"></span>
            </li>
            <li>
                <span class="col1">비밀번호 확인</span>
                <span class="col2"><input type="password" name="pass_confirm"></span>
            </li>
            <li>
                <span class="col1">이름</span>
                <span class="col2"><input type="text" name="name"></span>
            </li>
            <li>
                <span class="col1">이메일</span>
                <span class="col2"><input type="text" name="email"></span>
            </li>
        </ul>
        <ul class="buttons">
            <li><button type="button" onclick="check_input()">저장하기</button></li>
            <li><button type="button" onclick="reset_form()">취소하기</button></li>
        </ul>
    </div>
</form>