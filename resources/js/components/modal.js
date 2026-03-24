class Modal {
  static open(id) {
    document.getElementById(id).classList.remove('hidden')
  }
  static close(id) {
    document.getElementById(id).classList.add('hidden');
  }
}

window.Modal = Modal

document.addEventListener('DOMContentLoaded', function() {
  document.addEventListener('click', function(e) {
    const elOpenModal = e.target.closest('[data-open-modal]');
    if (elOpenModal) {
      const idOpen = elOpenModal.dataset.openModal
      Modal.open(idOpen)
    }
    
    const elCloseModal = e.target.closest('[data-close-modal]');
    if (elCloseModal) {
      const idClose = elCloseModal.dataset.closeModal
      Modal.close(idClose)
    }
  
    if (e.target.classList.contains('modal-backdrop')) {
      e.target.classList.add('hidden');
    }
  })
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.modal-backdrop').forEach((modal)=>{
        modal.classList.add('hidden');
      })
    }
  })
})