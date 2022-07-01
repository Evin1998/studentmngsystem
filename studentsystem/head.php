<!-- head -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Management System</title>
    <link rel="icon" href="img/student.png" type="image/x-icon" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- main css -->
    <link href="css/style.css?ts=<?=time()?>" type="text/css" rel="stylesheet" />
    <style>
        ::placeholder {
            color: #cdcdcd;
        }
        .feedbackClass {
            padding-left: 150px;
        }
        .numberlist {
            width: 50%;
        }
        .numberlist ol {
            counter-reset: li;
            list-style: none;
            *list-style: decimal;
            font: 15px "trebuchet MS", "lucida sans";
            padding: 0;
            margin-bottom: 4em;
        }
        .numberlist ol ol {
            margin: 0 0 0 2em;
        }
        .numberlist a {
            position: relative;
            display: block;
            padding: 0.4em 0.4em 0.4em 2em;
            *padding: 0.4em;
            margin: 0.5em 0;
            background: #fff;
            color: #444;
            text-decoration: none;
            -moz-border-radius: 0.3em;
            -webkit-border-radius: 0.3em;
            border-radius: 0.3em;
        }
        .numberlist a:hover {
            background: #d8dfea;
            text-decoration: underline;
        }
        .numberlist a:before {
            content: counter(li);
            counter-increment: li;
            position: absolute;
            left: -0.5em;
            top: 55%;
            margin-top: -1.3em;
            background: #4b79c2;
            background: -webkit-gradient(linear, center top, center bottom, from(#507ec7), to(#426eb5));
            background: -webkit-linear-gradient(#507ec7, #426eb5);
            height: 2.5em;
            width: 2.5em;
            line-height: 1.75em;
            border: 0.3em solid #fff;
            text-align: center;
            font-weight: bold;
            -moz-border-radius: 2em;
            -webkit-border-radius: 2em;
            border-radius: 2em;
            color: #fff;
        }
        .numberlist a:hover:before {
            background: #fff;
            color: #000;
            border-color: #3b5998;
        }
    </style>
</head>
<!-- head -->
