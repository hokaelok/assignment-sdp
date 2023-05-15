function addQuest() {
    event.preventDefault();
    console.log("submitted")
    var quest = document.getElementById("ques").value
    var ans = document.getElementById("ans").value
    var op1 = document.getElementById("op-1").value
    var op2 = document.getElementById("op-2").value
    var op3 = document.getElementById("op-3").value
    var op4 = document.getElementById("op-4").value
    var toJson = ({
        "questions": 
        {
            "question": quest,
            "answers" : {
                "a": op1,
                "b": op2,
                "c": op3,
                "d": op4
            },
            "correctAnswer": ans,
        },
    });
    if (op1.length === 0 || op2.length === 0 || op3.length === 0 || op4.length === 0 || quest.length === 0 || ans.length === 0) {
        alert("please enter details")
    }
    else {
        questList.push(toJson)
        alert('added ' + questList.length + " questions")
        console.log(questList)
    }
}

var questList = []

function createSubmit(email) {
    if (questList.length > 0) {
        var title = prompt("Please enter the title of your quiz", "")
        var usname = email.substring(0, email.lastIndexOf("@"));
        var JsonData = ({
            "mcq-uid": uuidv4(),
            "title": title,
            "created-by": usname,
            'user-email': email,
            "questions": questList
        })
        console.log(JsonData)
        uuid = uuidv4();
        window.location.href="teacher-createmcqHandler.php?JsonData="+JSON.stringify(JsonData);
    }
    else {
        alert("Please add questions first via 'Add more questions' before submitting")
    }
}

// https://stackoverflow.com/questions/105034/how-to-create-a-guid-uuid
function uuidv4() {
    return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
      (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}
