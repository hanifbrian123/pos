// Global Wrapper API
import { getCsrfToken } from "./helper"

export async function apiFetch(url, options={}) {
  console.log(url);
  try {
    const response = await fetch(url, {
      headers: {
        'Content-Type': 'aplication/json',
        'X-CSRF-TOKEN': getCsrfToken(),
      },
      ...options
    })
  
    const data = await response.json()

    return data
  } catch (error) {
    console.error(error)
  }
}