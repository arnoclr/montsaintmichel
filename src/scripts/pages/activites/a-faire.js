
async function getScheduleAsync(date) {
    const response = await fetch('/ajax/horairesTrain?date=' + date);
    const schedule = await response.json();
    return schedule;
}

const userDateInput = document.querySelector(".dateSchedule")
userDateInput.addEventListener("input", async (e)=>{
    const myInputText = e.target.value;
    // remove year from input
    const myInputTextWithoutYear = myInputText.substring(5);
    
    const schedule = await getScheduleAsync(myInputTextWithoutYear);

    var el = document.querySelector(".scheduleContainer");
    el.innerHTML = "Horaires : " + schedule.horaires;

    if (schedule.horaires == "Fermé") {
        el.style.color = "red";
    } else {
        el.style.color = "black";
    }

})