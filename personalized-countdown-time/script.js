let countdownInterval;

function startCountdown() {
  clearInterval(countdownInterval);  // Clear any previous countdowns

  const eventTime = document.getElementById("event-time").value;
  const targetDate = new Date(eventTime).getTime();

  if (isNaN(targetDate)) {
    alert("Please select a valid date and time.");
    return;
  }

  countdownInterval = setInterval(() => {
    const now = new Date().getTime();
    const timeRemaining = targetDate - now;

    if (timeRemaining <= 0) {
      clearInterval(countdownInterval);
      document.getElementById("countdown").innerHTML = "<h2>Event Started!</h2>";
      return;
    }

    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    document.getElementById("days").textContent = days < 10 ? "0" + days : days;
    document.getElementById("hours").textContent = hours < 10 ? "0" + hours : hours;
    document.getElementById("minutes").textContent = minutes < 10 ? "0" + minutes : minutes;
    document.getElementById("seconds").textContent = seconds < 10 ? "0" + seconds : seconds;
  }, 1000);
}
