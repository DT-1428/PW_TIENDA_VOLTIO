<style>
  .blur-wrapper {
      position: relative;
      width: 100%;
    }

  .overlay-wrapper {
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1000;
  width: 90%;
  max-width: 1200px;
  display: flex;
  justify-content: space-between;
  gap: 20px;
  padding: 0 40px;
  border-radius: 25px;
  margin-bottom: 60px;
  }

.overlay-wrapper::before,
    .overlay-wrapper::after {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(10px);
      z-index: -1;

    }
    .overlay-wrapper::before {
      left: 0;
      background: linear-gradient(90deg, rgba(45, 43, 43, 0.8)),( rgba(86, 28, 219, 0));
    }
    .overlay-wrapper::after {
      right: 0;
      background: linear-gradient(90deg, rgba(45, 43, 43, 0.8)),( rgba(86, 28, 219, 0));
    }
    

  .overlay-container {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 0.2rem;
  border-radius: 10px;
  text-align: center;
  flex: 1;
  }

  .carousel {
  position: relative;
  z-index: 1;
  }

  .video-container {
  max-width: 800px;
  margin: 0 auto; 
  border: 1px solid #ccc;
  position: relative;
  padding-bottom: 56.25%;
  height: 0;
  overflow: hidden;
  }

  .video-container video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; 
        }
  </style>


<div class="blur-wrapper">
<div class="overlay-wrapper">
  <div class="overlay-container">
    <div class="video-container">
        <video src="./videos./iPhone 16 Pro Max.mp4" autoplay muted loop></video>
    </div>
    <div>
      <a href="https://www.apple.com/la/" target="_blank"><img src="./IMG./icon-apple.png" widht="60rem" height="60rem"></a>
    </div>
  </div>
  <div class="overlay-container">
    <div class="video-container">
        <video src="./videos./Ps5.mp4" autoplay muted loop></video>
    </div>
    <div>
      <a href="https://www.playstation.com/es-pe/ps5/" target="_blank"><img src="./IMG./icon-ps5.png" widht="60rem" height="60rem"></a>
    </div>
  </div>
  <div class="overlay-container">
    <div class="video-container">
        <video src="./videos./Samsung.mp4" autoplay muted loop></video>
    </div>
    <div>
      <a href="https://www.samsung.com/pe/?srsltid=AfmBOoornFPoZePCqX_Vq4_LLsTi49l5QZP29UPIRAgSekw7C7s2LPdH" target="_blank"><img src="./IMG./icon-samsung.png" widht="60rem" height="60rem"></a>
    </div>
  </div>
</div>


