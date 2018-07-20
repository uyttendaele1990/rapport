<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapport {{$students[0]->name}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        body {
            background-color:lightgrey;
        }
        #card {
            background-color:lightblue;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 100%;
            border-radius: 5px;
            padding: 10px;
        }

        #card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container{
            padding: 2px 16px;
        }

        .test {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active, .test:hover {
            background-color: #555;
        }

        .exam {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active, .exam:hover {
            background-color: #555;
        }

        .content {
            padding: 0px 18px;
            display: none;
            overflow: hidden;
            background-color:lightblue;
            height: auto;
        }

        .content3 {
            padding: 5% 20%;
            display: none;
            overflow: hidden;
            background-color:lightblue;
            font-size:14px;
        }

        .col-md-4 {
            display: block;
            margin-left: auto;
            margin-right: auto
        }

        .testdata {
            
            width:100%;
            cursor:pointer;
        }

        .float-left {
            background-color:white;
            width:65%;
            overflow: auto;
            height: auto;
        }

        .float-right {
            background: lightgreen;
            width:15%;
            overflow: auto;
            height: auto;
            display: flex;
            align-items: center;
            padding-left: 3%;
        }
        
        #emax {
            background: black;
            color:white;
            width:20%;
            overflow: auto;
            height: auto;
        }
        .row {
            border:1px solid black;
        }
        a {
            color:black;
        }
        a:hover {
            color:red;
        }
        .float-left:hover{
            background-color:lightgrey;
        }

        @media (min-width: 600px)  {
            #card {
                width: 538px;
            }
            .testdata {
                font-size:22px;
            }
            .content3 {
                font-size: 18px;
            }
            h4 {
                font-size: 40px;
            }
            .test {
                font-size: 22px;
            }
            .exam {
                font-size: 22px;
            }
            #points {
                font-size:24px;
            }
        }
        @media (max-width: 600px)  {
            .testdata {
                font-size:16px;
            }
            .content3 {
                font-size: 12px;
            }
            h4 {
                font-size: 30px;
            }
            .test {
                font-size: 16px;
            }
            .exam {
                font-size: 16px;
            }
            #points {
                font-size:16px;
            }
        }
    </style>
</head>
<body><center>
    <div class="container">
        <div class='row' style='border:none'>
            @foreach ($students as $student)
                <div class="col-md-6" style='margin-left: auto;margin-right: auto;'>
                    <div id="card">
                      <img src="../public/ik.jpg" alt="Avatar" style='width:45%;border:2px solid white;border-radius:5px;'>
                      <div class="container">
                            <h4><b>{{$student->name}}</b></h4>
                            @foreach ($student->school as $school)
                                <div hidden>{{$som = $school->grades + $som }}</div>
                                <div hidden>{{$teller = $teller + $school->max}}</div>
                            @endforeach
                            @if($teller !== 0)
                                <div id='points'>
                                     <span><img src="../public/grad.png" alt="Avatar" style='width:10%;border-radius:5px'>
                                     <p style='border-radius:15px;border: 1px solid grey;background-color:lightgreen;margin:5% 30% 5% 30%'>{{ round(($som / $teller)*100, 2) }} %</p></span>
                                </div>
                            @else
                                <p>geen data beschikbaar</p>
                            @endif
                            <div hidden>{{$teller = 0}}</div>
                            <a href='#content-test'>
                                <button class="test" onclick='show()' style='text-align:center;'>
                                    Modules
                                </button>
                            </a>
                            <div id="content-test" class="content">
                              <p>
                                @foreach($vaks as $vak)
                                    @if($vak->name !== "https://voetbal.be")
                                        <div hidden> {{$teller++}} {{$som = 0}} {{$max = 0}}</div>
                                        <a href='#{{$teller}}'>
                                            
                                            <div id='test{{$teller}}' class = "testdata" onclick="toon1({{$teller}})">
                                                <div class="row">
                                                    <div class = "float-left">
                                                     {{$vak->name}}
                                                    </div>
                                                    @foreach($tests as $test)
                                                        @if($test->test_id == $vak->id)
                                                            <div hidden>{{$som = $som + $test->grades}} {{$max = $max + $test->max }}</div>
                                                        @endif
                                                    @endforeach
                                                    <div  class = "float-right ">
                                                      {{$som}}
                                                    </div>
                                                    <div id='emax' class = "float-right">
                                                      {{$max}}
                                                    </div>   
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    <div id="{{$teller}}" class='content3'>
                                    @foreach ($tests as $test)
                                        @if($test->test_id == $vak->id)
                                            <div class='row'>
                                                <div class = "float-left" style='background:white;'>
                                                  {{$test->test_name->name}}
                                                </div>
                                                <div  class = "float-right ">
                                                  {{$test->grades}} 
                                                </div>
                                                <div id='emax' class = "float-right">
                                                  {{$test->max}}
                                                </div>
                                            </div>
                                            
                                        @endif 
                                    @endforeach
                                    </div>
                                    <br>
                                @endforeach
                              </p>
                            </div>
                            <a href='#content-exam'><button class="exam" onclick='show1()' style='text-align:center'>Eindwerk</button></a>
                            <a href='#exams'>
                                <div id='content-exam' class="content">
                                    <p>
                                    <div class="row">
                                        <div hidden> {{$som = 0}} {{$max = 0}}</div>
                                        <div class = "testdata" href='#exams' onclick="toon()">
                                            <div class = "float-left">
                                             {{$vak->name}}
                                            </div>
                                            @foreach($exams as $exam)
                                                @if($exam->test_id == $vak->id)
                                                    <div hidden>{{$som = $som + $exam->grades}} {{$max = $max + $exam->max }}</div>
                                                @endif
                                            @endforeach
                                            <div id='emax' class = "float-right ">
                                               {{$max}}
                                            </div>
                                            <div class = "float-right">
                                               {{$som}}
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div id="exams" class='content3'> 
                              @foreach ($exams as $exam)
                                    @if($exam->test_id == $vak->id)
                                        <div class="row">                                             
                                              <div class = "float-left" style='background:white;'>
                                                 {{$exam->test_name->name}}
                                              </div>
                                              <div class = "float-right ">
                                                {{$exam->grades}}
                                              </div>
                                              <div id='emax' class = "float-right">
                                                 {{$exam->max}}
                                              </div>
                                        </div>
                                    @endif
                              @endforeach
                            </div>
                            </p>
                      </div>
                    </div>
                </div>
            @endforeach 
        </div>    
    </div>
</center>
<script> 
    const content = document.getElementById("content-test");
    const content1 = document.getElementById("content-exam");
    const content2 = document.getElementById("exams");
    
    function show(){
        if (content.style.display === "block") {
            content.style.display = "none";
            for (let i = 1; i <= 8; i++){
                    document.getElementById(i).style.display = "none";
            }
        } else {
            content.style.display = "block";
            content1.style.display = "none";
            content2.style.display = "none";
        }
    }

    function show1(){
        if (content1.style.display === "block") {
            content1.style.display = "none";
            content2.style.display = "none";
        } else {
            content1.style.display = "block";
            content.style.display = "none";
        }
    }

    function toon(){
        if (content2.style.display === "block") {
            content2.style.display = "none";
        } else {
            content2.style.display = "block";            
        }
    }

    function toon1(id){
        const content3 = document.getElementById(id);
        if (content3.style.display === "block") {
            content3.style.display = "none";
        } else {
            content3.style.display = "block";
            for (let i = 1; i <= 8; i++){
                if((i !== id) && (document.getElementById(i).style.display == "block") ){
                    document.getElementById(i).style.display = "none";
                }
            }
            
        }
    }

    function showselect(id){
        const content4 = document.getElementById(test+id)
        content4.style.background = 'lightgrey';
    }

</script>

</body>
</html>