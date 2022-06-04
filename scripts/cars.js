function showPopup() {
  // don't show popup on the 0 plate
  if (this.dataset.num === '0') {
    return;
  }
  // Add the "show" class to the details pane to make it visible
  let details = document.querySelector('.details');
  details.classList.add('show');

  // Put the number of the hovered plate into the details pane
  let plateNum = document.querySelector('.plate-num');
  plateNum.innerHTML = this.dataset.num;

  let plateSpotted = document.querySelector('.plate-spotted');
  plateSpotted.innerHTML =
    this.dataset.spotted === 'true' ? 'Found it!' : 'Still looking...';

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

async function loadPanels(panel) {
  // fetch the new panels
  let response = await fetch(`./includes/blocks.php?q=${panel}`);
  let text = await response.text(); // read response body as text

  const panels = document.querySelector('.numblock-wrapper');
  panels.innerHTML = text;

  const offset = document.getElementById('curPage');
  offset.innerHTML = panel;

  const plates = document.querySelectorAll('.plate');
  plates.forEach((plate) => plate.addEventListener('mouseover', showPopup));
  plates.forEach((plate) => plate.addEventListener('mouseout', hidePopup));
}

function changePage() {
  console.log(this);
  const offset = document.getElementById('curPage');
  let newOffset = '0';
  if (this.dataset != undefined) {
    newOffset = this.dataset.btn;
  }
  let curOffset = offset.innerHTML;

  if (newOffset === 'prev') {
    newOffset = '' + (+curOffset - 1);
  }
  if (newOffset === 'next') {
    newOffset = '' + (+curOffset + 1);
  }
  if (+newOffset < 0) {
    newOffset = '0';
  }
  if (+newOffset > 9) {
    newOffset = '9';
  }

  if (this.classList) {
    const buttons = document.querySelectorAll('.pager-btn');
    buttons.forEach((btn) => btn.classList.remove('active'));
    this.classList.add('active');
  }

  loadPanels(newOffset);
}

async function addPlate() {
  const msg = document.querySelector('.message-wrapper');

  let inputVal = document.querySelector('.carnumber');
  let plate = inputVal.value;

  let res = await fetch(`./includes/addplate.php?plate=${plate}`);
  let msgtext = await res.text();

  msg.innerHTML = msgtext;

  const k = Math.floor(plate / 1000);

  if (k >= 0 && k < 10) {
    loadPanels(k);
  }

  inputVal.value = '';
  inputVal.focus();
}

// add event listener to pager buttons
const buttons = document.querySelectorAll('.pager-btn');
buttons.forEach((btn) => btn.addEventListener('click', changePage));

const addPageBtn = document.getElementById('addplate');
addPageBtn.addEventListener('click', addPlate);

changePage();
