{{-- <!-- Preloader -->
<div id="preloader">
    <div class="loader-container">
        <div class="spinner"></div>
        <span class="app-label">Simple App</span>
    </div>
</div>

<style>
    /* Preloader Styles */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9); /* Transparent background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999; /* Ensure it's on top */
    }

    /* Loader Container */
    .loader-container {
        text-align: center;
    }

    /* Spinning Animation */
    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid rgba(0, 0, 0, 0.1);
        border-top: 5px solid #007bff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    /* Loading Text */
    .app-label {
        display: block;
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        opacity: 0.8;
    }

    /* Spin Animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Hide preloader after the page is fully loaded
        window.onload = function() {
            setTimeout(() => {
                document.getElementById("preloader").style.display = "none";
            }, 500); // Delay for smooth transition
        };
    });
</script> --}}
<!-- Preloader -->
<div id="preloader">
    <div class="loader">
        <div class="line bg-primary"></div>
        <div class="line bg-secondary"></div>
        <div class="line bg-success"></div>
        <div class="line bg-danger"></div>
        <div class="line bg-warning"></div>
        <div class="line bg-info"></div>
    </div>
    <!-- Add a label below the loader -->
    <div class="preloader-label">
        <span>Simple App</span>
    </div>
</div>

<style>
    /* Preloader Styles */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9); /* Slight transparency */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 99999;
    }

    /* Loader Animation */
    .loader {
        display: flex;
        gap: 6px;
    }

    .line {
        width: 6px;
        height: 50px;
        animation: growShrink 1s infinite ease-in-out;
    }

    .line:nth-child(1) { animation-delay: 0s; }
    .line:nth-child(2) { animation-delay: 0.1s; }
    .line:nth-child(3) { animation-delay: 0.2s; }
    .line:nth-child(4) { animation-delay: 0.3s; }
    .line:nth-child(5) { animation-delay: 0.4s; }
    .line:nth-child(6) { animation-delay: 0.5s; }

    @keyframes growShrink {
        0%, 100% { height: 20px; }
        50% { height: 50px; }
    }

    /* Preloader label style */
    .preloader-label {
        margin-top: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-align: center;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Hide preloader after the page is fully loaded
        window.onload = function() {
            setTimeout(() => {
                document.getElementById("preloader").style.display = "none";
            }, 500); // Small delay for smooth transition
        };
    });
</script>
