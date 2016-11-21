<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>
<body>
<div class="container col-md-7">
    <h1><?php echo date('M',mktime(0,0,0,$month,1,$year)) ?></h1>
    <?php echo calendar($month,$year) ?>

    <form method="POST">
        <input name="previous" type="submit" value="Previous">
        <input id="next" name="next" type="submit" value="Next">
        <input name="reset" type="submit" value="Back to present">
    </form>
</div>


<span id="ajaxButton">
  Make a request
</span>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    function next() {
        alert("this works!");
        $.ajax({
            url: 'cal.php',
            data: {action: 'next'},
            type: 'post',
            success: function (output) {
                alert(output);
            }
        });
    };

    //    (function() {
//        var httpRequest;
//        document.getElementById("ajaxButton").onclick = function() { makeRequest('cal.php'); };
//
//        function makeRequest(url) {
//            httpRequest = new XMLHttpRequest();
//
//            if (!httpRequest) {
//                alert('Giving up :( Cannot create an XMLHTTP instance');
//                return false;
//            }
//            httpRequest.onreadystatechange = alertContents;
//            httpRequest.open('GET', url);
//            httpRequest.send();
//        }
//
//        function alertContents() {
//            if (httpRequest.readyState === XMLHttpRequest.DONE) {
//                if (httpRequest.status === 200) {
//                    var date = new Date();
//                    var month = date.getMonth()+1;
//                    // call calendar function with parameters month and year
//                    //after that the function takes those parameters and builds respective calendar
//
//                } else {
//                    alert('There was a problem with the request.');
//                }
//            }
        }
    })();
</script>
</body>
</html>
