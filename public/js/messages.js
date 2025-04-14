
  const userList = document.getElementById('userList');
  const messageArea = document.getElementById('messageArea');

  fetch('get_names.php')
    .then(res => res.json())
    .then(names => {
      names.forEach(name => {
        const li = document.createElement('li');
        li.className = "p-2 border-bottom";
        li.innerHTML = `<a href="#" class="d-flex justify-content-between user-link" data-name="${name}">
                          <div class="pt-1"><p class="fw-bold mb-0">${name}</p></div>
                        </a>`;
        userList.appendChild(li);
      });

      document.querySelectorAll('.user-link').forEach(link => {
        link.addEventListener('click', function (e) {
          e.preventDefault();
          const name = this.dataset.name;
          loadMessages(name);
        });
      });
    });

  function loadMessages(name) {
    fetch(`get_messages.php?name=${encodeURIComponent(name)}`)
      .then(res => res.json())
      .then(data => {
        messageArea.innerHTML = '';
        if (data.length === 0) {
          messageArea.innerHTML = '<p class="text-muted text-center">Nincs üzenet ehhez a névhez.</p>';
          return;
        }
        data.forEach(msg => {
          messageArea.innerHTML += `
            <div class="card mb-3">
              <div class="card-header d-flex justify-content-between p-2">
                <p class="fw-bold mb-0">${name} - ${msg.subject}</p>
                <p class="text-muted small mb-0">${msg.submitted_at}</p>
              </div>
              <div class="card-body py-2">
                <p class="mb-0">${msg.message}</p>
              </div>
            </div>`;
        });
      });
  }


