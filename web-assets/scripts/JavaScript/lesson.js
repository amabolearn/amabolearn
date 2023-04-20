const mainNoteSection = document.querySelectorAll('.main-note-section' );
const sectionHeader = document.querySelectorAll('.main-note-section h2');
for(i=1; i<mainNoteSection.length; i++){
  mainNoteSection[i].classList.add('js-default-style');
}
for(i=1; i<mainNoteSection.length; i++){
 sectionHeader[i].addEventListener('click', (e) => {
  e.target.parentNode.classList.toggle('collapsed');
 })
}
