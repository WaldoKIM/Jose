<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>아이디 검색</title>
    <style type="text/css">
        body,input,button{font-size:20px}
    </style>
</head>
<body>
    <form name="search_id" action="id_check.php" method="post">
        <fieldset>
            <legend>아이디 검색</legend>
            <p>
                <label for="sch_id">아이디 입력</label>
                <input type="text" name="sch_id" id="sch_id">
                <button type="submit">검색</button>
            </p>
        </fieldset>
    </form>
</body>
</html>