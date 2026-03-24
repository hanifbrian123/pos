import Rules from './rules';

const Validator = {
  validateField(field) {
    const dataRule = field.dataset.rule.split('|');
    const value = field.value;
    for (let rule of dataRule) {
      let [ruleType, param] = rule.split(':')
      if (!Rules[ruleType](value, param)) {
        this.showError(field, ruleType, param)
        return false;
      }
    }
    this.clearError(field);
    return true;
  },

  showError(field, rule, param) {
    let message = ""
    switch (rule) {
      case 'required': message = 'Field Wajib diisi'; break;
      case 'min': message = `Nilai tidak boleh kurang dari ${param} kata `; break;
      case 'max': message = `Nilai tidak boleh lebih dari ${param} kata `; break;
      default: message = 'Isian salah';
    }
    let errEl = field.nextElementSibling;
    if (!errEl || !errEl.classList.contains('text-error')) {
      errEl = document.createElement('small');
      errEl.classList.add('text-error', 'text-red-500');
      field.after(errEl);
    }
    errEl.innerText = message;
  },

  clearError(field) {
    let errEl = field.nextElementSibling
    if (errEl && errEl.classList.contains('text-error')) {
      errEl.remove()
    }
  }
}

export default Validator;