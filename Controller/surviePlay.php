<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-wdth, initial-scale=1.0">
    <title>Eduquiz</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/qcm.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="icon" href="../img/cerveau.png" type="image/x-icon">
</head>

<body>
    <div class="qcm">
        <h1 id="title">Mode Survie - Question du QCM</h1>
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

        <div class="validate" id="validation-buttons">
            <button class="qcm_btn" id="validate">Valider</button>
        </div>

        <div id="result-message"></div>

        <div class="validate">
            <button class="qcm_btn" id="next-question" style="display: none;">Question suivante</button>
        </div>

        <div class="login-signup">
            <span class="text"><a href="../View/index.php" class="text signup-text">Retournez à l'accueil</a></span>
        </div>
        <div class="login-signup" id="countdown-container">Temps restant : <span id="countdown">60 </span> Secondes
        </div>
      

    </div>

    <script>
        const questionElement = document.querySelector('#question');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const labels = document.querySelectorAll('label');

        const easyButton = document.querySelector('#easy');
        const validateButton = document.querySelector('#validate');
        const hardButton = document.querySelector('#hard');

        const nextQuestionButton = document.getElementById('next-question');
        nextQuestionButton.addEventListener('click', loadNextQuestion);

        let theme = localStorage.getItem('selectedTheme');
        console.log('Selected Theme:', theme);

        let difficulty = 'Easy';
        let currentQuestionData;
        let currentScore = 0;
        
        function fetchQuestion() {
            const apiUrl = "https://quizapi.io/api/v1/questions?apiKey=rQhtODxlCFj6WAfGessemTv2p46af9cIwwcpoLBr&limit=1";

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
                document.getElementById('result-message').textContent = "Tu n'as sélectionné aucune réponse !";
                return;
            }

            const isCorrect = selectedAnswers.every(answerKey => {
                return questionData.correct_answers[`${answerKey}_correct`] === 'true';
            });

            const resultMessageElement = document.getElementById('result-message');
            if (isCorrect) {
                resultMessageElement.textContent = "Bravo ! Tu as eu la bonne réponse !";
                currentScore++;
            } else {
                resultMessageElement.textContent = "Désolé, ce n'est pas la bonne réponse...";
            }

            // Masquer les boutons de validation
            const validationButtonsContainer = document.getElementById('validation-buttons');
            validationButtonsContainer.style.display = 'none';

            // Afficher le bouton "Question suivante"
            const nextQuestionButton = document.getElementById('next-question');
            nextQuestionButton.style.display = 'block';
        }

        validateButton.addEventListener('click', () => {
            checkAnswer(currentQuestionData);
        });


        function loadNextQuestion() {
            fetchQuestion();
            document.getElementById('result-message').textContent = "";
            document.getElementById('next-question').style.display = 'none';

            const validationButtonsContainer = document.getElementById('validation-buttons');
            validationButtonsContainer.style.display = 'block';
        }

        function endGame() {
            fetch('../Model/update_survie.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: "score=" + encodeURIComponent(currentScore)
                })
                .then(response => response.text())
                .then(text => console.log(text))
                .catch(error => console.error('Error:', error));
        }


        fetchQuestion();
        function startCountdown() {
            let countdown = 60;
            const countdownElement = document.getElementById('countdown');

            const countdownInterval = setInterval(function () {

                countdownElement.textContent = countdown;
                countdown--;
                if (countdown < 0) {
               
                    clearInterval(countdownInterval);
                    endGame();
                    window.location.href = '../View/survie.php'; 
                }
            }, 1000);
        }
        
        window.onload = function () {
            startCountdown();
        };
    </script>

</body>

</html>