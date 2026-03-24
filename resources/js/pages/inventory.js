import { apiFetch } from "../utils/ajax";
import { fillFormBySelectors } from "../utils/helper";


document.addEventListener('click', async function(e) {
  const target = e.target
  const dataOpenEditModal = target.closest('[data-open-modal="editItemModal"]');
  if (!dataOpenEditModal) {
    return;
  }

  const id = dataOpenEditModal.dataset.id;
  const data = await getItemDataById(id);
  
  fillFormBySelectors('#editItemModal form', 
    {
      'input[name="name"]':data.name,
      'input[name="id"]':id,
    }, 
    {
      'action':`/inventory/${id}`
    }
  )
})


async function getItemDataById(id) {
  const data = await apiFetch(`/inventory/showAjax/${id}`);
  return data;
}

