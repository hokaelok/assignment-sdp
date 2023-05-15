function readMCQ(uid) {
    
  var data = document.getElementById(uid).innerHTML
  console.log(JSON.parse(data))
  var info = (JSON.parse(data))
  var quest = info.questions;  
  var questlist = [];
  console.log(questlist)
  for (var i = 0; i < quest.length; i++) {
    questlist.push(quest[i].questions)
  }

  function buildQuiz(){
    // variable to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach(
      (currentQuestion, questionNumber) => {

        // variable to store the list of possible answers
        const answers = [];

        // and for each available answer...
        for(letter in currentQuestion.answers){

          // ...add an HTML radio button
          answers.push(
            `<label class="px-3">
              <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label>`
          );
        }

        // add this question and its answers to the output
        output.push(
          `<div class="questions text-lg font-bold"> ${currentQuestion.question} </div>
          <div class="answers px-5"> ${answers.join('')} </div>`
        );
      }
    );

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join('');
    console.log(quizContainer)
  }

  function showResults(){

    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');

    // keep track of user's answers
    var numCorrect = 0;

    // for each question...
    myQuestions.forEach( (currentQuestion, questionNumber) => {

      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // remove all the colors
      answerContainers[questionNumber].classList.remove('text-emerald-500');
      answerContainers[questionNumber].classList.remove('text-rose-500');
      // if answer is correct
      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].classList.add('text-emerald-500');
      }
      // if answer is wrong or blank
      else{
        // color the answers red
        answerContainers[questionNumber].classList.add('text-rose-500')
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `you got ${numCorrect} out of ${myQuestions.length} questions correct`;
    console.log(numCorrect);
  }

  const quizContainer = document.getElementById('quiz');
  const resultsContainer = document.getElementById('results');
  const submitButton = document.getElementById('submit');
  const myQuestions = questlist;

  // Kick things off
  buildQuiz();

  // Event listeners
  submitButton.addEventListener('click', showResults);
  document.getElementById("displayQuizList").classList.add("hidden");
  document.getElementById("displayQuizContainer").classList.remove("hidden");

}

function backMCQ() {
  document.getElementById("displayQuizList").classList.remove("hidden");
  document.getElementById("displayQuizContainer").classList.add("hidden");
}