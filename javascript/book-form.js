


function popimg(){
  let overlayDiv = document.getElementById("overlay");

  overlayDiv.style.display = "flex";
}

function closepopup(){
  let overlayDiv = document.getElementById("overlay");
  overlayDiv.style.display = "none";
}


function popBeverage(){
  let overlayDiv = document.getElementById("overlayBeverage");

  overlayDiv.style.display = "flex";
}

function closeBeverage(){
  let overlayDiv = document.getElementById("overlayBeverage");
  overlayDiv.style.display = "none";
}



function popSideDish(){
  let overlayDiv = document.getElementById("overlaySideDish");

  overlayDiv.style.display = "flex";
}

function closeSideDish(){
  let overlayDiv = document.getElementById("overlaySideDish");
  overlayDiv.style.display = "none";
}


const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    }
  });
}, {
  threshold: 0.1 
});

document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
  observer.observe(el);
});

