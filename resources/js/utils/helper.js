export function getCsrfToken() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  if (csrfToken) {
    return csrfToken
  } else {
    return 'tidak ada';
  }
}

export function fillFormBySelectors(formSelector, body, header) {
  const form = document.querySelector(formSelector);
  console.log("masuk fill: ", body, header);
  // fill body
  Object.entries(body).forEach(([key, value])=>{
    form.querySelector(key).value = value;
  })
  
  // fill header
  Object.entries(header).forEach(([key, value])=>{
    form.setAttribute(key, value);
  })
}


