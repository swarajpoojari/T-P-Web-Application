<?php
session_start();
if ($_SESSION["username"]) {
} else {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link rel="stylesheet" href="css/resume.css">
</head>

<body>

    <h1 id="resumeH1" style="text-align: center;">Resume</h1>
    <img src="images/acpcelogo.png" id="mainClass" name="logo" alt="">

    <form class="input-fields">
        <div class="personalDetails">
            <h4>PERSONAL DETAILS</h1>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="name" class="inputClass" />
                <label for="course">Course</label>
                <input type="text" name="course" placeholder="BE" class="inputClass" />
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" placeholder="XXXXXXXXX" class="inputClass" />
                <label for="cgpa">CGPA</label>
                <input type="text" name="cgpa" />
                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="xyx@mail.com" />
                <!-- <label for="image">Upload Profile Photo</label> -->

                <br>
                <br>
                <br>
                <!-- </div>
              <div id="logo">
              </div> -->

                <!-- ACADEMIC DETAIL -->
                <h4>ACADEMIC DETAILS</h1>
                    <!-- 12 CLASS -->
                    <label for="course12">Course</label>
                    <input class="longInput" type="text" name="course12" placeholder="Class XII">
                    <label for="specialization">Specialization</label>
                    <input class="longInput" type="text" name="specialization" placeholder="Science/Commerce...">
                    <label for="college">Institute/College</label>
                    <input class="longInput" type="text" name="college" placeholder="JR. CLG">
                    <label for="board">Board/University</label>
                    <input class="longInput" type="text" name="board" placeholder="Maharashtra State Board of Secondary and Higher Secondary Education(MSBSHSE)">
                    <label for="score">Score</label>
                    <input class="longInput" type="text" name="score" placeholder="%">
                    <label for="year">Year</label>
                    <input class="longInput" type="text" name="year" placeholder="2019">
                    <br>
                    <br>
                    <br>
                    <!-- 10 CLASS -->
                    <label for="course10">Course</label>
                    <input class="longInput" type="text" name="course10" placeholder="Class X">
                    <label for="specialization10">Specialization</label>
                    <input class="longInput" type="text" name="specialization10" placeholder="------">
                    <label for="college10">Institute/College</label>
                    <input class="longInput" type="text" name="college10" placeholder="School">
                    <label for="board10">Board/University</label>
                    <input class="longInput" type="text" name="board10" placeholder="Maharashtra State Board of Secondary and Higher Secondary Education(MSBSHSE)">
                    <label for="score10">Score</label>
                    <input class="longInput" type="text" name="score10" placeholder="%">
                    <label for="year10">Year</label>
                    <input class="longInput" type="text" name="year10" placeholder="2017">
                    <br>
                    <br>
                    <br>
                    <label for="subjects">Subjects/Electives</label>
                    <input class="longInput" type="text" name="subjects">
                    <br>
                    <br>
                    <label for="technical">Technical Proficiency</label>
                    <input class="longInput" type="text" name="technical">
                    <br>
                    <br>
                    <label for="Internship">Summer Internship/ Work Experinece</label>
                    <input class="longInput" type="text" name="internship" placeholder="...">
                    <br>
                    <br>
                    <label for="projects">Projects</label>
                    <input class="longInput" type="text" name="projects" placeholder="resume builder">
                    <br>
                    <br>
                    <label for="position">Position of Responsibility</label>
                    <input class="longInput" type="text" name="position" placeholder="Trainee">
                    <br>
                    <br>
                    <label for="activity">Extra Curricular Activities</label>
                    <input class="longInput" type="text" name="activity" placeholder="Painting">
                    <br>
                    <br>
                    <label for="awards">Awards and Recognitions</label>
                    <input class="longInput" type="text" name="awards" placeholder="....">
                    <br>
                    <br>
                    <label for="certificate">Certifications</label>
                    <input class="longInput" type="text" name="certificate" placeholder="Google Java Course Certificate">
                    <input class="longInput" type="text" name="certifyingAuthority" placeholder="Google">
                    <br>
                    <br>
                    <label for="competition">Competitions</label>
                    <input class="longInput" type="text" name="competition" placeholder="....">
                    <br>
                    <br>
                    <label for="workshop">Conferences and Workshops</label>
                    <input class="longInput" type="text" name="workshop" placeholder="....">
                    <br>
                    <br>
                    <label for="test">Test</label>
                    <input class="longInput" type="text" name="test">
                    <input class="longInput" type="text" name="dateOfTest">
                    <input class="longInput" type="text" name="testScore">
                    <br>
                    <br>
                    <label for="patent">Patents</label>
                    <input class="longInput" type="text" name="patent" placeholder="....">
                    <br>
                    <br>
                    <label for="publicaiton">Publications</label>
                    <input class="longInput" type="text" name="publicaiton" placeholder="....">
                    <br>
                    <br>
                    <label for="scholarship">Scholarship</label>
                    <input class="longInput" type="text" name="scholarship" placeholder="....">
                    <br>
                    <br>
                    <label for="volunteer">Volunteer Experience</label>
                    <input class="longInput" type="text" name="volunteer" placeholder="....">
                    <br>
                    <br>
                    <label for="language">Languages Known</label>
                    <input class="longInput" type="text" name="language" placeholder="python, java, etc">
        </div>
    </form>

    <div class="output">

    </div>

    <div class="btn">
        <button onclick="toggle()">Preview or edit</button>
    </div>
    <!-- <script>
        $(".details").hide();
    </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/resume.js"></script>
</body>

</html>