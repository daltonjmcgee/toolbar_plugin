/**
 * The script here basically just finds the User Dropdown Icon,
 * gets it width, then sets the `right` style attribute on the
 * publish button to that, then assesses that on any resize so that
 * no matter the person's displayed name, the button is always in
 * the correct X position.
 */

window.addEventListener("DOMContentLoaded", () => {
  const userButton = document.getElementById('wp-admin-bar-top-secondary');
  const publishButton = document.getElementById('wp-admin-bar-publish');
  publishButton.setAttribute('style', `right:calc(${userButton.offsetWidth}px + 7px)`);
  window.addEventListener('resize', () => {
    publishButton.setAttribute('style', `right:calc(${userButton.offsetWidth}px + 7px)`);
  })
})
