function toggleForm(elementId) {
  var form = document.getElementById(elementId);
  if (form.style.display === "none") {
      fadeIn(form);
      scrollToElement(form);
  } else {
      fadeOut(form);
  }
}


function fadeOut(element) {
  var opacity = 1;
  var fadeOutInterval = setInterval(function() {
      if (opacity > 0) {
          opacity -= 0.05;
          element.style.opacity = opacity;
      } else {
          clearInterval(fadeOutInterval);
          element.style.display = "none";
      }
  }, 50);
}

function fadeIn(element) {
  var opacity = 0;
  element.style.opacity = opacity;
  element.style.display = "block";
  var fadeInInterval = setInterval(function() {
      if (opacity < 1) {
          opacity += 0.05; // Riduci il tasso di incremento dell'opacità per una transizione più lenta
          element.style.opacity = opacity;
      } else {
          clearInterval(fadeInInterval);
      }
  }, 50); // Tempo in millisecondi per l'effetto di dissolvenza
}

function scrollToElement(element) {
  var duration = 1000; // Durata dell'animazione in millisecondi
  var targetPosition = element.getBoundingClientRect().top;
  var startingPosition = window.pageYOffset || document.documentElement.scrollTop;
  var distance = targetPosition - startingPosition;
  var startTime = null;

  function scrollAnimation(currentTime) {
      if (startTime === null) startTime = currentTime;
      var timeElapsed = currentTime - startTime;
      var scrollProgress = Math.min(timeElapsed / duration, 1);
      window.scrollTo(0, startingPosition + distance * ease(scrollProgress));

      if (timeElapsed < duration) {
          requestAnimationFrame(scrollAnimation);
      }
  }

  function ease(t) {
      return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
  }

  requestAnimationFrame(scrollAnimation);
}
function toggleFormWithParam(idForm, folderName, folderId){
    var selectElement = $("select");
    $("#" + idForm).slideToggle(1000);
    selectElement.append("<option value='" + folderId + "' selected>" + folderName + "</option>");

}

