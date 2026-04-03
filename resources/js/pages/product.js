import { apiFetch } from "../utils/ajax";
import { fillFormBySelectors } from "../utils/helper";

document.addEventListener("click", async function (e) {
    const target = e.target;
    const dataOpenEditModal = target.closest(
        '[data-open-modal="editProductModal"]',
    );
    const dataOpenDeleteModal = target.closest(
        '[data-open-modal="deleteProductModal"]',
    );
    if (dataOpenEditModal) {
        const id = dataOpenEditModal.dataset.id;
        const data = await getProductDataById(id);

        fillFormBySelectors(
            "#editProductModal form",
            {
                'input[name="name"]': data.name,
                'select[name="category_id"]': data.category_id,
                'input[name="id"]': id,
            },
            {
                action: `/product/${id}`,
            },
        );
    } else if (dataOpenDeleteModal) {
        const id = dataOpenDeleteModal.dataset.id;
        document.querySelector(`#deleteProductModal form`).action = `/product/${id}`;
    }
});

async function getProductDataById(id) {
    const data = await apiFetch(`/product/showAjax/${id}`);
    return data;
}

// Search front-end
const table = document.querySelector("#productTable");
