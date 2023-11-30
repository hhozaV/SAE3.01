<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/qcm.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="img/cerveau.png" type="image/x-icon">
</head>

<body>

    <div class="qcm">
        <h1 id="title">Question du QCM</h1>
        <p id="question"></p>
        <div class="answers">
            <input type="checkbox" id="answer_a">
            <label for="answer_a" id="label_a"></label><br>

            <input type="checkbox" id="answer_b">
            <label for="answer_b" id="label_b"></label><br>

            <input type="checkbox" id="answer_c">
            <label for="answer_c" id="label_c"></label><br>

            <input type="checkbox" id="answer_d">
            <label for="answer_d" id="label_d"></label><br>
        </div>

        <div class="validate">
            <button class="qcm_btn" id="easy" data-difficulty="easy">Question trop difficile</button>
            <button class="qcm_btn" id="validate">Valider</button>
            <button class="qcm_btn" id="hard" data-difficulty="hard">Question trop facile</button>
        </div>

        <div class="login-signup">
            <span class="text"><a href="index.php" class="text signup-text">Retournez à l'acceuil</a></span>
        </div>
    </div>

    <script>
        const questionElement = document.querySelector('#question');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const labels = document.querySelectorAll('label');

        const easyButton = document.querySelector('#easy');
        const validateButton = document.querySelector('#validate');
        const hardButton = document.querySelector('#hard');

        let theme = localStorage.getItem('selectedTheme');
        console.log('Selected Theme:', theme);

        let difficulty = 'Easy';
        let currentQuestionData;

        easyButton.addEventListener('click', () => {
            if (difficulty === 'Easy') {
                alert('Il n\'y a pas de difficulté plus facile ...');
            } else if (difficulty === 'Medium') {
                difficulty = 'Easy';
                updateDifficulty();
                fetchQuestion();
            } else if (difficulty === 'Hard') {
                difficulty = 'Medium';
                updateDifficulty();
                fetchQuestion();
            }
        });

        hardButton.addEventListener('click', () => {
            if (difficulty === 'Easy') {
                difficulty = 'Medium';
                updateDifficulty();
                fetchQuestion();
            } else if (difficulty === 'Medium') {
                difficulty = 'Hard';
                updateDifficulty();
                fetchQuestion();
            } else if (difficulty === 'Hard') {
                alert('Il n\'y a pas de difficulté plus difficile !');
            }
        });

        function updateDifficulty() {
            if (difficulty === 'Easy') {
                easyButton.disabled = true;
                hardButton.disabled = false;
            } else if (difficulty === 'Medium') {
                easyButton.disabled = false;
                hardButton.disabled = false;
            } else if (difficulty === 'Hard') {
                easyButton.disabled = false;
                hardButton.disabled = true;
            }
        }
        function fetchQuestion() {
            // Construction de l'url pour l'api, seulement la difficultée qui change dans l'url
            const apiUrl = "https://quizapi.io/api/v1/questions?apiKey=rQhtODxlCFj6WAfGessemTv2p46af9cIwwcpoLBr&category=" + theme + "&difficulty=" + difficulty + "&limit=1";

            fetch(apiUrl)
                .then(response => response.json())
                .then(decodedJson => {
                    console.log("API :", decodedJson);
                    const questionData = decodedJson[0];
                    currentQuestionData = questionData;
                    displayQuestion(questionData);
                });
        }

        function displayQuestion(questionData) {
            questionElement.textContent = questionData.question;

            checkboxes.forEach((checkbox, index) => {
                const answerKey = `answer_${String.fromCharCode(97 + index)}`;
                const label = labels[index];

                if (questionData.answers[answerKey] !== null) {
                    checkbox.classList.remove('hidden');
                    label.textContent = questionData.answers[answerKey];
                } else {
                    checkbox.classList.add('hidden');
                }
            });

            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        function checkAnswer(questionData) {
            const selectedAnswers = [];
            checkboxes.forEach((checkbox, index) => {
                const answerKey = `answer_${String.fromCharCode(97 + index)}`;
                if (checkbox.checked) {
                    selectedAnswers.push(answerKey);
                }
            });

            if (selectedAnswers.length === 0) {
                alert("Tu n'as sélectionné aucune réponse !");
                return;
            }

            const isCorrect = selectedAnswers.every(answerKey => {
                return questionData.correct_answers[`${answerKey}_correct`] === 'true';
            });

            // Stocker le résultat dans le stockage local
            localStorage.setItem("isCorrect", isCorrect);

            // Rediriger vers la page switch.php
            window.location.href = "switch.php";
        }

        validateButton.addEventListener('click', () => {
            checkAnswer(currentQuestionData);
        });

        fetchQuestion();
    </script>

</body>

</html>