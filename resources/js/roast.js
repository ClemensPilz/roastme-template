document.addEventListener('DOMContentLoaded', () => {
  const roastForm = document.getElementById('roast-form');
  const roastedButton = document.getElementById('roasted-button');
  const spinner = document.getElementById('roasted-spinner');
  const background = document.getElementById('background');
  const button = document.getElementById('roasted-button');

  roastForm.addEventListener('submit', () => {
    button.setAttribute('disabled', 'true');
    spinner.classList.remove('visually-hidden');
  });

  roastForm.addEventListener('keydown', (e) => {
    if (e.key !== 'Enter') return;
    e.preventDefault();
    if (roastedButton.hasAttribute('disabled')) return;
    roastedButton.click();
  });
});
