const Rules = {
  required(value) {
    return value.trim() !== "";
  },
  min(value, param) {
    return value.length >= param;
  },
  max(value, param) {
    return value.length <= param;
  }
}
export default Rules;