document.addEventListener("DOMContentLoaded", function () {
    const timerContainer = document.querySelector('.auction-timer');
    const endTimeStr = timerContainer.getAttribute('data-endtime');
    const isClosed = timerContainer.getAttribute('data-is-closed');
    const bidInput = document.getElementById('bid-input');
    const hiddenBidAmount = document.getElementById('bid-amount');
    const placeBidButton = document.querySelector('.place-bid');
    let minBid = 0;
    if (bidInput) {
        minBid = parseFloat(bidInput.min);
    }

    const endTime = new Date(endTimeStr).getTime();

    function updateTimer() {
        const now = new Date().getTime();
        let timeLeft = endTime - now;

        if (timeLeft <= 0 || isClosed === '1') {
            document.getElementById("days").textContent = "00";
            document.getElementById("hours").textContent = "00";
            document.getElementById("minutes").textContent = "00";
            document.getElementById("seconds").textContent = "00";
            clearInterval(timerInterval);

            const popup = document.getElementById("auctionEndedPopup");
            popup.classList.remove('popup-hidden');
            popup.classList.add('popup-visible');

            setTimeout(() => {
                location.reload();
            }, 2000);

            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        document.getElementById("days").textContent = String(days).padStart(2, '0');
        document.getElementById("hours").textContent = String(hours).padStart(2, '0');
        document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
        document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
    }

    if (isClosed === '0') {
        updateTimer();
        var timerInterval = setInterval(updateTimer, 1000);
    } else {
        document.getElementById("days").textContent = "00";
        document.getElementById("hours").textContent = "00";
        document.getElementById("minutes").textContent = "00";
        document.getElementById("seconds").textContent = "00";
    }

    function isButtonLocked() {
        return placeBidButton.dataset.locked === "true";
    }

    function updateButtonState() {
        if (isButtonLocked()) {
            placeBidButton.disabled = true;
            return;
        }

        const enteredBid = parseFloat(bidInput.value);
        if (isNaN(enteredBid) || enteredBid < minBid) {
            placeBidButton.disabled = true;
        } else {
            placeBidButton.disabled = false;
            hiddenBidAmount.value = enteredBid;
        }
    }

    updateButtonState();

    bidInput.addEventListener('input', updateButtonState);

});