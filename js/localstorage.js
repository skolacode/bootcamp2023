function saveData(key, value) {
  localStorage.setItem(key, JSON.stringify(value))
}

function getData(key) {
  const data = localStorage.getItem(key)
  return JSON.parse(data)
}