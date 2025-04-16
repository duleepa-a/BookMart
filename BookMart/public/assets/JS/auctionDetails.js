document.addEventListener("DOMContentLoaded", function () {
    const timerContainer = document.querySelector('.auction-timer');
    const endTimeStr = timerContainer.getAttribute('data-endtime');

    // Convert to a timestamp
    const endTime = new Date(endTimeStr).getTime();

    function updateTimer() {
        const now = new Date().getTime();
        let timeLeft = endTime - now;

        if (timeLeft <= 0) {
            // Timer expired
            document.getElementById("days").textContent = "00";
            document.getElementById("hours").textContent = "00";
            document.getElementById("minutes").textContent = "00";
            document.getElementById("seconds").textContent = "00";
            clearInterval(timerInterval);
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        // Pad with leading zeros
        document.getElementById("days").textContent = String(days).padStart(2, '0');
        document.getElementById("hours").textContent = String(hours).padStart(2, '0');
        document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
        document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
    }

    // Run immediately and then every second
    updateTimer();
    const timerInterval = setInterval(updateTimer, 1000);
});