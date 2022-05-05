const plates = document.querySelectorAll('.plate');
console.log(plates[0]);

function showPopup() {
  // Add the "show" class to the details pane to make it visible
  let details = document.querySelector('.details');
  details.classList.add('show');

  // Put the number of the hovered plate into the details pane
  let plateNum = document.querySelector('.plate-num');
  plateNum.innerHTML = this.dataset.num;

  // Set the top and left properties of the details pane
  let root = document.documentElement;
  let newtop = this.getBoundingClientRect().top - 60;
  let newleft = this.getBoundingClientRect().left;
  root.style.setProperty('--details-top', newtop + 'px');
  root.style.setProperty('--details-left', newleft + 'px');
}

function hidePopup() {
  // Remove the "show" class from the details pane to hide it again.
  let details = document.querySelector('.details');
  details.classList.remove('show');
}

plates.forEach((plate) => plate.addEventListener('mouseover', showPopup));
plates.forEach((plate) => plate.addEventListener('mouseout', hidePopup));
