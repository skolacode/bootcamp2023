function saveData(key, value) {
  localStorage.setItem(key, JSON.stringify(value))
}

// key = name, value = "hello"

// stringfy > value = "'/hello/'"

// before parse > data = "'/hello/'" >>> after parse > value = "hello"

function getData(key) {
  const data = localStorage.getItem(key)

  return JSON.parse(data)
}