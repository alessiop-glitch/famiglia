<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasaList 🏠 Famiglia Puzzolo</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #e0f2fe 0%, #f1f5f9 50%, #e0e7ff 100%);
            --card-bg: rgba(255, 255, 255, 0.75);
            --card-border: rgba(255, 255, 255, 0.6);
            --text-color: #0f172a;
            --text-muted: #64748b;
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            --input-bg: rgba(255, 255, 255, 0.9);
            --item-bg: rgba(255, 255, 255, 0.85);
            --accent-color: #3b82f6;
        }

        [data-theme="dark"] {
            --bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            --card-bg: rgba(30, 41, 59, 0.75);
            --card-border: rgba(255, 255, 255, 0.08);
            --text-color: #f8fafc;
            --text-muted: #94a3b8;
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            --input-bg: rgba(15, 23, 42, 0.8);
            --item-bg: rgba(30, 41, 59, 0.85);
            --accent-color: #60a5fa;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        body {
            background: var(--bg-gradient);
            background-attachment: fixed;
            color: var(--text-color);
            padding: 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 750px;
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 28px;
            height: fit-content;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .title-area h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .theme-toggle,
        .btn-icon {
            background: var(--input-bg);
            border: 1px solid var(--card-border);
            color: var(--text-color);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: transform 0.2s;
        }

        .theme-toggle:hover,
        .btn-icon:hover {
            transform: scale(1.05);
        }

        /* Progress Bar */
        .progress-container {
            margin-bottom: 20px;
            background: var(--input-bg);
            padding: 14px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-muted);
        }

        .progress-bar-bg {
            background: rgba(148, 163, 184, 0.2);
            height: 10px;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            width: 0%;
            transition: width 0.5s ease;
            border-radius: 10px;
        }

        /* Leaderboard Gamification */
        .leaderboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }

        .leaderboard-card {
            background: var(--input-bg);
            border: 1px solid var(--card-border);
            padding: 10px 12px;
            border-radius: 14px;
            text-align: center;
            font-size: 0.8rem;
        }

        .leaderboard-card strong {
            display: block;
            font-size: 1rem;
            margin-top: 2px;
            color: var(--accent-color);
        }

        /* Form di Inserimento Avanzato */
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: var(--input-bg);
            padding: 18px;
            border-radius: 18px;
            border: 1px solid var(--card-border);
            margin-bottom: 24px;
        }

        .input-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            padding: 10px 14px;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            font-size: 0.9rem;
            outline: none;
            background: var(--card-bg);
            color: var(--text-color);
            flex: 1;
            min-width: 120px;
        }

        button.btn-add {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
            width: 100%;
        }

        button.btn-add:hover {
            transform: translateY(-2px);
            opacity: 0.95;
        }

        /* Filtri */
        .filters {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 10px;
            margin-bottom: 16px;
        }

        .filter-btn {
            background: var(--input-bg);
            border: 1px solid var(--card-border);
            color: var(--text-muted);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .filter-btn.active {
            background: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }

        /* Lista Elementi con Animazioni */
        ul.task-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-height: 420px;
            overflow-y: auto;
            padding-right: 4px;
        }

        li.task-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px;
            background: var(--item-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            animation: slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            transition: transform 0.2s, opacity 0.2s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        li.task-item.completed {
            opacity: 0.55;
            background: rgba(241, 245, 249, 0.4);
        }

        li.task-item.completed span.task-text {
            text-decoration: line-through;
            color: var(--text-muted);
        }

        .task-content {
            display: flex;
            align-items: center;
            gap: 14px;
            flex: 1;
            cursor: pointer;
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: var(--accent-color);
        }

        .task-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .task-text {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .task-badges {
            display: flex;
            gap: 6px;
            align-items: center;
            flex-wrap: wrap;
        }

        .badge-tag {
            font-size: 0.68rem;
            padding: 2px 8px;
            border-radius: 6px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .prio-alta {
            background: #fee2e2;
            color: #dc2626;
        }

        .prio-media {
            background: #fef3c7;
            color: #d97706;
        }

        .prio-bassa {
            background: #e0e7ff;
            color: #4338ca;
        }

        .tag-chiara {
            background: #fce7f3;
            color: #db2777;
        }

        .tag-daniele {
            background: #e0f2fe;
            color: #0284c7;
        }

        .tag-alessio {
            background: #dcfce7;
            color: #16a34a;
        }

        .tag-cristian {
            background: #fef3c7;
            color: #d97706;
        }

        .btn-delete {
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.1rem;
            padding: 6px;
            border-radius: 8px;
            transition: color 0.2s, background-color 0.2s;
        }

        .btn-delete:hover {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid var(--card-border);
        }

        .btn-clear {
            background: transparent;
            border: none;
            color: var(--text-muted);
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: underline;
        }

        .btn-clear:hover {
            color: #ef4444;
        }

        .empty-state {
            text-align: center;
            color: var(--text-muted);
            padding: 40px 0;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <div class="title-area">
                <h1>CasaList 🏠 Puzzolo</h1>
            </div>
            <div class="header-actions">
                <button class="btn-icon" onclick="chiediNotifiche()" title="Attiva Notifiche">🔔</button>
                <button class="theme-toggle" onclick="toggleTheme()" id="themeBtn" title="Cambia Tema">🌙</button>
            </div>
        </header>

        <!-- Barra di Progresso -->
        <div class="progress-container">
            <div class="progress-header">
                <span>Avanzamento Impegni</span>
                <span id="progressText">0% completato</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-bar-fill" id="progressBar"></div>
            </div>
        </div>

        <!-- Classifica Punti Familiare (Gamification) -->
        <div class="leaderboard" id="leaderboard">
            <!-- Popolata via JS -->
        </div>

        <!-- Form Inserimento Avanzato -->
        <div class="input-group">
            <div class="input-row">
                <input type="text" id="taskInput" placeholder="Cosa c'è da fare o comprare?" autocomplete="off">
                <select id="memberSelect">
                    <option value="Chiara Pascoli">Chiara</option>
                    <option value="Daniele Puzzolo">Daniele</option>
                    <option value="Alessio Puzzolo">Alessio</option>
                    <option value="Cristian Puzzolo">Cristian</option>
                </select>
            </div>
            <div class="input-row">
                <select id="categorySelect">
                    <option value="🏠 Casa">🏠 Casa</option>
                    <option value="🛒 Spesa">🛒 Spesa</option>
                    <option value="📚 Scuola/Lavoro">📚 Scuola/Lavoro</option>
                    <option value="⚡ Commissioni">⚡ Commissioni</option>
                </select>
                <select id="prioritySelect">
                    <option value="Bassa">Bassa Priorità</option>
                    <option value="Media" selected>Media Priorità</option>
                    <option value="Alta">🚨 Alta Priorità</option>
                </select>
                <input type="date" id="dateInput" title="Data di Scadenza">
                <input type="number" id="costInput" placeholder="Costo €" step="0.50" min="0" style="max-width: 100px;">
            </div>
            <button class="btn-add" onclick="aggiungiTask()">Aggiungi alla Lista</button>
        </div>

        <!-- Filtri Rapidi -->
        <div class="filters">
            <button class="filter-btn active" onclick="setFiltro('tutti', this)">Tutti</button>
            <button class="filter-btn" onclick="setFiltro('da_fare', this)">Da Fare</button>
            <button class="filter-btn" onclick="setFiltro('completati', this)">Completati</button>
            <button class="filter-btn" onclick="setFiltro('Alessio', this)">Solo Alessio</button>
            <button class="filter-btn" onclick="setFiltro('Chiara', this)">Solo Chiara</button>
            <button class="filter-btn" onclick="setFiltro('Daniele', this)">Solo Daniele</button>
            <button class="filter-btn" onclick="setFiltro('Cristian', this)">Solo Cristian</button>
        </div>

        <!-- Lista Impegni -->
        <ul class="task-list" id="taskList">
            <!-- I task verranno inseriti qui dinamicamente -->
        </ul>

        <div class="action-bar">
            <span id="totaleSpesa" style="font-size: 0.85rem; font-weight: 600;">Stima Spesa: 0.00 €</span>
            <button class="btn-clear" onclick="pulisciCompletati()">Pulisci completati</button>
        </div>
    </div>

    <script>
        let allTasks = [];
        let filtroAttuale = 'tutti';

        // Web Audio API per Effetto Sonoro "Pop"
        function playCompletionSound() {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(587.33, ctx.currentTime); // D5
                osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.1); // A5
                gain.gain.setValueAtTime(0.2, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.1);
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start();
                osc.stop(ctx.currentTime + 0.1);
            } catch (e) {
                console.log("Audio Web non supportato.");
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            caricaTask();
            autoRiconosciReparto();
        });

        // Auto-categorizzazione spesa
        function autoRiconosciReparto() {
            const input = document.getElementById("taskInput");
            const catSelect = document.getElementById("categorySelect");
            const paroleSpesa = ['latte', 'pane', 'pasta', 'mela', 'acqua', 'detersivo', 'formaggio', 'carne'];

            input.addEventListener("input", () => {
                const val = input.value.toLowerCase();
                if (paroleSpesa.some(p => val.includes(p))) {
                    catSelect.value = "🛒 Spesa";
                }
            });
        }

        function caricaTask() {
            fetch('api.php?action=get')
                .then(response => response.json())
                .then(data => {
                    allTasks = data;
                    renderizza();
                });
        }

        function aggiungiTask() {
            const input = document.getElementById("taskInput");
            const text = input.value.trim();
            if (!text) return;

            const payload = {
                text: text,
                member: document.getElementById("memberSelect").value,
                category: document.getElementById("categorySelect").value,
                priority: document.getElementById("prioritySelect").value,
                dueDate: document.getElementById("dateInput").value,
                cost: document.getElementById("costInput").value
            };

            fetch('api.php?action=add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
                .then(res => res.json())
                .then(data => {
                    allTasks = data;
                    renderizza();
                    input.value = '';
                    document.getElementById("costInput").value = '';
                    inviaNotifica("Nuovo Task Aggiunto!", text);
                });
        }

        function toggleTask(id) {
            const task = allTasks.find(t => t.id == id);
            if (task && !task.completed) {
                playCompletionSound();
            }

            fetch('api.php?action=toggle', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            })
                .then(res => res.json())
                .then(data => {
                    allTasks = data;
                    renderizza();
                });
        }

        function eliminaTask(id) {
            fetch('api.php?action=delete', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            })
                .then(res => res.json())
                .then(data => {
                    allTasks = data;
                    renderizza();
                });
        }

        function modificaTask(id, vecchioTesto) {
            const nuovoTesto = prompt("Modifica il testo del task:", vecchioTesto);
            if (!nuovoTesto || nuovoTesto.trim() === '') return;

            fetch('api.php?action=edit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, text: nuovoTesto.trim() })
            })
                .then(res => res.json())
                .then(data => {
                    allTasks = data;
                    renderizza();
                });
        }

        function pulisciCompletati() {
            fetch('api.php?action=clear_completed')
                .then(res => res.json())
                .then(data => {
                    allTasks = data;
                    renderizza();
                });
        }

        function setFiltro(filtro, btn) {
            filtroAttuale = filtro;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderizza();
        }

        function renderizza() {
            const listEl = document.getElementById("taskList");
            listEl.innerHTML = '';

            // Filtraggio
            let filtrati = allTasks.filter(t => {
                if (filtroAttuale === 'da_fare') return !t.completed;
                if (filtroAttuale === 'completati') return t.completed;
                if (['Alessio', 'Chiara', 'Daniele', 'Cristian'].includes(filtroAttuale)) {
                    return t.member.includes(filtroAttuale);
                }
                return true;
            });

            // Calcolo Statistiche e Avanzamento
            const completati = allTasks.filter(t => t.completed).length;
            const totale = allTasks.length;
            const perc = totale === 0 ? 0 : Math.round((completati / totale) * 100);
            document.getElementById("progressBar").style.width = perc + '%';
            document.getElementById("progressText").textContent = `${perc}% completato (${completati}/${totale})`;

            // Calcolo Costo Spesa Stmato
            const costoTotale = allTasks.reduce((acc, t) => acc + (t.cost ? parseFloat(t.cost) : 0), 0);
            document.getElementById("totaleSpesa").textContent = `Stima Spesa Totale: ${costoTotale.toFixed(2)} €`;

            // Calcolo Leaderboard Gamification
            aggiornaLeaderboard();

            if (filtrati.length === 0) {
                listEl.innerHTML = '<li class="empty-state">Nessun impegno in questa vista. 🎉</li>';
                return;
            }

            filtrati.forEach(task => {
                let tagClass = 'tag-chiara';
                if (task.member.includes('Daniele')) tagClass = 'tag-daniele';
                else if (task.member.includes('Alessio')) tagClass = 'tag-alessio';
                else if (task.member.includes('Cristian')) tagClass = 'tag-cristian';

                let prioClass = 'prio-media';
                if (task.priority === 'Alta') prioClass = 'prio-alta';
                if (task.priority === 'Bassa') prioClass = 'prio-bassa';

                const li = document.createElement('li');
                li.className = `task-item ${task.completed ? 'completed' : ''}`;

                li.innerHTML = `
                    <div class="task-content" onclick="toggleTask(${task.id})">
                        <input type="checkbox" ${task.completed ? 'checked' : ''} onclick="event.stopPropagation(); toggleTask(${task.id})">
                        <div class="task-details">
                            <span class="task-text" ondblclick="event.stopPropagation(); modificaTask(${task.id}, '${escapeJs(task.text)}')">${escapeHtml(task.text)}</span>
                            <div class="task-badges">
                                <span class="badge-tag ${tagClass}">${escapeHtml(task.member.split(' ')[0])}</span>
                                <span class="badge-tag ${prioClass}">${task.priority}</span>
                                <span class="badge-tag" style="background: var(--input-bg); color: var(--text-color);">${task.category}</span>
                                ${task.dueDate ? `<span class="badge-tag" style="background:#f3f4f6; color:#374151;">📅 ${task.dueDate}</span>` : ''}
                                ${task.cost ? `<span class="badge-tag" style="background:#ecfdf5; color:#047857;">💰 ${parseFloat(task.cost).toFixed(2)}€</span>` : ''}
                            </div>
                        </div>
                    </div>
                    <button class="btn-delete" onclick="eliminaTask(${task.id})" title="Elimina">🗑️</button>
                `;
                listEl.appendChild(li);
            });
        }

        function aggiornaLeaderboard() {
            const punti = { 'Chiara': 0, 'Daniele': 0, 'Alessio': 0, 'Cristian': 0 };
            allTasks.forEach(t => {
                if (t.completed) {
                    const nome = t.member.split(' ')[0];
                    if (punti[nome] !== undefined) punti[nome] += 10;
                }
            });

            const lbEl = document.getElementById("leaderboard");
            lbEl.innerHTML = Object.keys(punti).map(nome => `
                <div class="leaderboard-card">
                    👤 ${nome}
                    <strong>🏆 ${punti[nome]} pt</strong>
                </div>
            `).join('');
        }

        function toggleTheme() {
            const currentTheme = document.body.getAttribute("data-theme");
            const newTheme = currentTheme === "dark" ? "light" : "dark";
            document.body.setAttribute("data-theme", newTheme);
            document.getElementById("themeBtn").textContent = newTheme === "dark" ? "☀️" : "🌙";
        }

        function chiediNotifiche() {
            if ("Notification" in window) {
                Notification.requestPermission().then(permission => {
                    if (permission === "granted") {
                        alert("Notifiche attivate con successo! 🔔");
                    }
                });
            }
        }

        function inviaNotifica(titolo, corpo) {
            if ("Notification" in window && Notification.permission === "granted") {
                new Notification(titolo, { body: corpo, icon: '🏠' });
            }
        }

        function escapeHtml(text) {
            return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
        }

        function escapeJs(text) {
            return text.replace(/'/g, "\\'").replace(/"/g, '\\"');
        }
    </script>
</body>

</html>