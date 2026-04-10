# Plateforme de Portfolio Professionnel Adaptatif
PortfolioLink est une application web académique développée en équipe (4 membres), permettant aux étudiants de créer, gérer et présenter leurs portfolios professionnels de manière dynamique et structurée.<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PortfolioLink — File Structure</title>
<style>
  :root {
    --bg: #0D0F14;
    --surface: #151820;
    --surface2: #1c2030;
    --border: #2a2e3e;
    --text: #e2e4ee;
    --muted: #6b7090;
    --hint: #3d4158;
    --blue: #4F8EF7;
    --purple: #7B5EA7;
    --green: #2DD98F;
    --amber: #F5A623;
    --red: #E05C5C;
    --font-mono: 'JetBrains Mono', 'Fira Code', 'Cascadia Code', monospace;
    --font-sans: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  html, body { background: var(--bg); color: var(--text); font-family: var(--font-mono); min-height: 100vh; }

  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap');

  body { padding: 2rem; }

  header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem; }
  header h1 { font-family: var(--font-sans); font-size: 1.4rem; font-weight: 600; color: var(--text); }
  header h1 span { color: var(--blue); }
  header p { font-family: var(--font-sans); font-size: 0.85rem; color: var(--muted); margin-top: 4px; }

  .legend { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 1.5rem; }
  .legend-item { display: flex; align-items: center; gap: 6px; font-family: var(--font-sans); font-size: 11px; color: var(--muted); }
  .badge { font-size: 10px; padding: 2px 7px; border-radius: 10px; font-weight: 500; font-family: var(--font-sans); }
  .done  { background: #2DD98F18; color: #2DD98F; border: 1px solid #2DD98F30; }
  .wip   { background: #F5A62318; color: #F5A623; border: 1px solid #F5A62330; }
  .todo  { background: #7B5EA718; color: #9d7fcb; border: 1px solid #7B5EA730; }

  .owner { font-size: 10px; padding: 2px 7px; border-radius: 10px; font-family: var(--font-sans); border: 1px solid var(--border); }
  .ow-y { background: #4F8EF710; color: #4F8EF7; border-color: #4F8EF730; }
  .ow-a { background: #2DD98F10; color: #2DD98F; border-color: #2DD98F30; }
  .ow-d { background: #7B5EA710; color: #9d7fcb; border-color: #7B5EA730; }
  .ow-n { background: #F5A62310; color: #F5A623; border-color: #F5A62330; }

  .tree { list-style: none; }
  .entry {
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 3px 8px 3px 4px;
    border-radius: 5px;
    transition: background 0.12s;
  }
  .entry:hover { background: var(--surface2); }
  .indent { display: flex; }
  .guide { width: 20px; flex-shrink: 0; display: flex; align-items: stretch; }
  .guide-line { width: 1px; background: var(--hint); flex: 1; margin: 0 auto; }
  .icon { font-size: 13px; flex-shrink: 0; }
  .name { font-size: 12px; color: var(--text); }
  .name.dir { color: var(--blue); font-weight: 500; }
  .comment { font-size: 11px; color: var(--muted); }
  .tags { display: flex; gap: 5px; align-items: center; margin-left: auto; flex-shrink: 0; }

  .search-bar {
    display: flex; align-items: center; gap: 10px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 8px 14px;
    margin-bottom: 1.5rem;
  }
  .search-bar input {
    background: none; border: none; outline: none;
    color: var(--text); font-family: var(--font-mono); font-size: 13px;
    flex: 1;
  }
  .search-bar input::placeholder { color: var(--hint); }
  .search-bar span { color: var(--muted); font-size: 13px; }

  .filters { display: flex; gap: 8px; margin-bottom: 1.5rem; flex-wrap: wrap; }
  .filter-btn {
    font-family: var(--font-sans); font-size: 11px; padding: 4px 12px;
    border-radius: 20px; border: 1px solid var(--border);
    background: var(--surface); color: var(--muted);
    cursor: pointer; transition: all 0.15s;
  }
  .filter-btn:hover, .filter-btn.active { background: var(--surface2); color: var(--text); border-color: var(--blue); }
  .filter-btn.active { color: var(--blue); }

  .stats {
    display: flex; gap: 20px; flex-wrap: wrap;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 8px; padding: 14px 20px;
    margin-bottom: 1.5rem;
  }
  .stat { font-family: var(--font-sans); }
  .stat .val { font-size: 1.2rem; font-weight: 600; color: var(--text); }
  .stat .lbl { font-size: 10px; color: var(--muted); margin-top: 1px; }
  .stat .val.done-c { color: var(--green); }
  .stat .val.wip-c  { color: var(--amber); }
  .stat .val.todo-c { color: var(--purple); }

  #no-results { display: none; font-family: var(--font-sans); font-size: 13px; color: var(--muted); padding: 2rem; text-align: center; }
</style>
</head>
<body>

<header>
  <h1>📁 <span>PortfolioLink</span> — File Structure</h1>
  <p>PHP 8 MVC · PostgreSQL · Groq AI · Docker Compose · Team planning reference</p>
</header>

<div class="stats" id="stats"></div>

<div class="search-bar">
  <span>🔍</span>
  <input type="text" id="search" placeholder="Search files, comments, owners..." oninput="renderTree()">
</div>

<div class="filters">
  <button class="filter-btn active" onclick="setFilter('all',this)">All</button>
  <button class="filter-btn" onclick="setFilter('done',this)">✅ Done</button>
  <button class="filter-btn" onclick="setFilter('wip',this)">🔄 In progress</button>
  <button class="filter-btn" onclick="setFilter('todo',this)">⏳ Pending</button>
  <button class="filter-btn" onclick="setFilter('Yassine',this)">👤 Yassine</button>
  <button class="filter-btn" onclick="setFilter('Adil',this)">👤 Adil</button>
  <button class="filter-btn" onclick="setFilter('Douaa',this)">👤 Douaa</button>
  <button class="filter-btn" onclick="setFilter('Najwa',this)">👤 Najwa</button>
</div>

<div id="tree-container"></div>
<div id="no-results">No files match your search.</div>

<script>
const data = [
  { name: "PortfolioLink/", type:"dir", depth:0 },
  { name: ".env", type:"file", depth:1, icon:"🔑", comment:"DB creds, Groq API key, app secret", badge:"done", owner:"Yassine" },
  { name: "docker-compose.yml", type:"file", depth:1, icon:"🐳", comment:"php-fpm · nginx · postgres · pgadmin · mailpit · ollama", badge:"done", owner:"Yassine" },
  { name: "index.php", type:"file", depth:1, icon:"🌐", comment:"Landing page + front controller (router entry)", badge:"done", owner:"Yassine" },
  { name: "router.php", type:"file", depth:1, icon:"🔀", comment:"URI → controller@action dispatcher", badge:"wip", owner:"Yassine" },

  { name: "config/", type:"dir", depth:1 },
  { name: "app.php", type:"file", depth:2, icon:"⚙️", comment:"APP_URL, environment, debug flag", badge:"todo", owner:"Yassine" },
  { name: "database.php", type:"file", depth:2, icon:"🗄️", comment:"PDO DSN, host, credentials (reads .env)", badge:"done", owner:"Yassine" },
  { name: "mail.php", type:"file", depth:2, icon:"📧", comment:"Mailpit SMTP config", badge:"todo", owner:"Yassine" },

  { name: "core/", type:"dir", depth:1 },
  { name: "Database.php", type:"file", depth:2, icon:"📦", comment:"PDO Singleton — getInstance()", badge:"done", owner:"Yassine" },
  { name: "Router.php", type:"file", depth:2, icon:"📦", comment:"Route registration + dispatch", badge:"wip", owner:"Yassine" },
  { name: "Session.php", type:"file", depth:2, icon:"📦", comment:"session_start guard, flash messages", badge:"wip", owner:"Yassine" },
  { name: "Middleware.php", type:"file", depth:2, icon:"📦", comment:"Auth guard, role check, CSRF verify", badge:"todo", owner:"Yassine" },
  { name: "Mailer.php", type:"file", depth:2, icon:"📦", comment:"PHPMailer wrapper → Mailpit/SMTP", badge:"todo", owner:"Yassine" },

  { name: "model/", type:"dir", depth:1 },
  { name: "User.php", type:"file", depth:2, icon:"📄", comment:"register, login, findByEmail, updateProfile", badge:"wip", owner:"Yassine" },
  { name: "Project.php", type:"file", depth:2, icon:"📄", comment:"submit, updateStatus, findByStudent, findPending", badge:"todo", owner:"Adil" },
  { name: "Skill.php", type:"file", depth:2, icon:"📄", comment:"getAll, attachToStudent, validateSkill", badge:"todo", owner:"Adil" },
  { name: "Comment.php", type:"file", depth:2, icon:"📄", comment:"add, getByProject, getReplies (self-join)", badge:"todo", owner:"Douaa" },
  { name: "Company.php", type:"file", depth:2, icon:"📄", comment:"register, search, sendContactRequest", badge:"todo", owner:"Najwa" },
  { name: "Notification.php", type:"file", depth:2, icon:"📄", comment:"create, markRead, getUnread", badge:"todo", owner:"Yassine" },
  { name: "AI/", type:"dir", depth:2 },
  { name: "Chatbot.php", type:"file", depth:3, icon:"🤖", comment:"Groq primary → Ollama fallback", badge:"done", owner:"Yassine" },
  { name: "CvParser.php", type:"file", depth:3, icon:"🤖", comment:"PDF → profile fields (Groq)", badge:"todo", owner:"Yassine" },
  { name: "SkillExtractor.php", type:"file", depth:3, icon:"🤖", comment:"project description → skills JSONB", badge:"todo", owner:"Yassine" },

  { name: "controller/", type:"dir", depth:1 },
  { name: "AuthController.php", type:"file", depth:2, icon:"🎮", comment:"showLogin, login, showRegister, register, logout", badge:"wip", owner:"Yassine" },
  { name: "ProfileController.php", type:"file", depth:2, icon:"🎮", comment:"show, edit, update, uploadAvatar, importPdf", badge:"wip", owner:"Adil" },
  { name: "ProjectController.php", type:"file", depth:2, icon:"🎮", comment:"index, create, store, review, approve, reject", badge:"todo", owner:"Adil" },
  { name: "ProfessorController.php", type:"file", depth:2, icon:"🎮", comment:"dashboard, reviewQueue, validate, feedback", badge:"todo", owner:"Douaa" },
  { name: "CompanyController.php", type:"file", depth:2, icon:"🎮", comment:"search, filter, sendRequest, requestList", badge:"todo", owner:"Najwa" },
  { name: "PortfolioController.php", type:"file", depth:2, icon:"🎮", comment:"show (public, no auth required)", badge:"todo", owner:"Adil" },
  { name: "AdminController.php", type:"file", depth:2, icon:"🎮", comment:"dashboard, users, stats, toggleActive", badge:"todo", owner:"Yassine" },
  { name: "ChatbotController.php", type:"file", depth:2, icon:"🎮", comment:"AJAX POST handler → returns JSON", badge:"done", owner:"Yassine" },

  { name: "views/", type:"dir", depth:1 },
  { name: "layouts/", type:"dir", depth:2 },
  { name: "main.php", type:"file", depth:3, icon:"🖼️", comment:"<head> + nav + chatbot include + footer", badge:"wip", owner:"Yassine" },
  { name: "auth.php", type:"file", depth:3, icon:"🖼️", comment:"Minimal layout for signin/signup", badge:"wip", owner:"Yassine" },
  { name: "public.php", type:"file", depth:3, icon:"🖼️", comment:"Layout for public portfolio (no nav auth)", badge:"todo", owner:"Adil" },
  { name: "auth/", type:"dir", depth:2 },
  { name: "signin.php", type:"file", depth:3, icon:"📝", comment:"Login form, CSRF token, error flash", badge:"wip", owner:"Yassine" },
  { name: "signup.php", type:"file", depth:3, icon:"📝", comment:"Register form, role selector, validation", badge:"wip", owner:"Yassine" },
  { name: "student/", type:"dir", depth:2 },
  { name: "workspace.php", type:"file", depth:3, icon:"📝", comment:"Dashboard: projects list, skills, stats", badge:"wip", owner:"Adil" },
  { name: "edit_profile.php", type:"file", depth:3, icon:"📝", comment:"Bio, avatar, links, PDF import button", badge:"todo", owner:"Adil" },
  { name: "submit_project.php", type:"file", depth:3, icon:"📝", comment:"Project form: title, desc, github, skills", badge:"todo", owner:"Adil" },
  { name: "professor/", type:"dir", depth:2 },
  { name: "dashboard.php", type:"file", depth:3, icon:"📝", comment:"Review queue (pending projects)", badge:"todo", owner:"Douaa" },
  { name: "review.php", type:"file", depth:3, icon:"📝", comment:"Single project review: approve/reject + skills", badge:"todo", owner:"Douaa" },
  { name: "company/", type:"dir", depth:2 },
  { name: "search.php", type:"file", depth:3, icon:"📝", comment:"Skill filter → student cards → contact CTA", badge:"todo", owner:"Najwa" },
  { name: "requests.php", type:"file", depth:3, icon:"📝", comment:"Sent contact requests + status tracking", badge:"todo", owner:"Najwa" },
  { name: "public/", type:"dir", depth:2 },
  { name: "portfolio.php", type:"file", depth:3, icon:"📝", comment:"Public shareable: validated projects + skills", badge:"todo", owner:"Adil" },
  { name: "admin/", type:"dir", depth:2 },
  { name: "dashboard.php", type:"file", depth:3, icon:"📝", comment:"Stats, user table, active toggle", badge:"todo", owner:"Yassine" },
  { name: "partials/", type:"dir", depth:2 },
  { name: "chatbot.php", type:"file", depth:3, icon:"🤖", comment:"AI widget (included in main layout)", badge:"done", owner:"Yassine" },
  { name: "skill_tag.php", type:"file", depth:3, icon:"🧩", comment:"Reusable skill badge component", badge:"todo", owner:"Adil" },
  { name: "project_card.php", type:"file", depth:3, icon:"🧩", comment:"Reusable project card (student + company)", badge:"todo", owner:"Adil" },
  { name: "flash.php", type:"file", depth:3, icon:"🧩", comment:"Success/error flash message component", badge:"todo", owner:"Yassine" },

  { name: "assets/", type:"dir", depth:1 },
  { name: "css/", type:"dir", depth:2 },
  { name: "app.css", type:"file", depth:3, icon:"🎨", comment:"Custom CSS vars + Tailwind @layer overrides", badge:"wip", owner:"Yassine" },
  { name: "js/", type:"dir", depth:2 },
  { name: "chatbot.js", type:"file", depth:3, icon:"⚡", comment:"AJAX chat widget logic", badge:"done", owner:"Yassine" },
  { name: "utils.js", type:"file", depth:3, icon:"⚡", comment:"Shared helpers: debounce, sanitize, toast", badge:"todo", owner:"Yassine" },
  { name: "student.js", type:"file", depth:3, icon:"⚡", comment:"Workspace interactions", badge:"todo", owner:"Adil" },
  { name: "company.js", type:"file", depth:3, icon:"⚡", comment:"Search filter + contact request AJAX", badge:"todo", owner:"Najwa" },

  { name: "uploads/", type:"dir", depth:1 },
  { name: "avatars/", type:"dir", depth:2 },
  { name: "projects/", type:"dir", depth:2 },
  { name: "cvs/", type:"dir", depth:2 },

  { name: "database/", type:"dir", depth:1 },
  { name: "schema.sql", type:"file", depth:2, icon:"🗄️", comment:"Full schema with indexes + constraints", badge:"done", owner:"Yassine" },
  { name: "seeds.sql", type:"file", depth:2, icon:"🗄️", comment:"Dev seed data (test users, skills, projects)", badge:"todo", owner:"Yassine" },
  { name: "migrations/", type:"dir", depth:2 },
];

let activeFilter = 'all';

function setFilter(f, btn) {
  activeFilter = f;
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  renderTree();
}

function ownerClass(o) {
  return { Yassine:'ow-y', Adil:'ow-a', Douaa:'ow-d', Najwa:'ow-n' }[o] || '';
}

function renderTree() {
  const q = document.getElementById('search').value.toLowerCase();
  const container = document.getElementById('tree-container');
  const noRes = document.getElementById('no-results');

  const files = data.filter(d => d.type === 'file');
  const doneC = files.filter(f => f.badge === 'done').length;
  const wipC  = files.filter(f => f.badge === 'wip').length;
  const todoC = files.filter(f => f.badge === 'todo').length;
  document.getElementById('stats').innerHTML = `
    <div class="stat"><div class="val">${files.length}</div><div class="lbl">Total files</div></div>
    <div class="stat"><div class="val done-c">${doneC}</div><div class="lbl">Done</div></div>
    <div class="stat"><div class="val wip-c">${wipC}</div><div class="lbl">In progress</div></div>
    <div class="stat"><div class="val todo-c">${todoC}</div><div class="lbl">Pending</div></div>
    <div class="stat"><div class="val" style="color:var(--blue)">${Math.round(doneC/files.length*100)}%</div><div class="lbl">Complete</div></div>
  `;

  // Determine which items to show
  const visibleNames = new Set();
  data.forEach(item => {
    if (item.type === 'dir') return;
    const matchQ = !q || item.name.toLowerCase().includes(q) || (item.comment||'').toLowerCase().includes(q) || (item.owner||'').toLowerCase().includes(q);
    const matchF = activeFilter === 'all' || item.badge === activeFilter || item.owner === activeFilter;
    if (matchQ && matchF) visibleNames.add(item.name + '|' + item.depth);
  });

  // Always show parent dirs of visible files
  const dirVisible = new Set();
  data.forEach((item, i) => {
    if (item.type !== 'file') return;
    const key = item.name + '|' + item.depth;
    if (!visibleNames.has(key)) return;
    // walk backwards to find parent dirs
    for (let j = i - 1; j >= 0; j--) {
      if (data[j].type === 'dir' && data[j].depth < item.depth) {
        dirVisible.add(data[j].name + '|' + data[j].depth);
        if (data[j].depth === 0) break;
      }
    }
  });

  let html = '<ul class="tree">';
  let shown = 0;
  data.forEach(item => {
    const key = item.name + '|' + item.depth;
    const isFile = item.type === 'file';
    const isDir = item.type === 'dir';
    if (isFile && !visibleNames.has(key)) return;
    if (isDir && !dirVisible.has(key) && (q || activeFilter !== 'all')) return;

    shown++;
    const indent = Array(item.depth).fill('<span class="guide"><span class="guide-line"></span></span>').join('');
    const icon = isDir ? '📁' : (item.icon || '📄');
    const nameClass = isDir ? 'name dir' : 'name';
    const tags = isFile ? `
      <div class="tags">
        ${item.badge ? `<span class="badge ${item.badge}">${item.badge}</span>` : ''}
        ${item.owner ? `<span class="owner ${ownerClass(item.owner)}">${item.owner}</span>` : ''}
      </div>` : '';

    html += `<li>
      <div class="entry">
        <div class="indent">${indent}</div>
        <span class="icon">${icon}</span>
        <span class="${nameClass}">${item.name}</span>
        ${item.comment ? `<span class="comment">← ${item.comment}</span>` : ''}
        ${tags}
      </div>
    </li>`;
  });
  html += '</ul>';

  if (shown === 0) {
    container.style.display = 'none';
    noRes.style.display = 'block';
  } else {
    container.style.display = '';
    noRes.style.display = 'none';
    container.innerHTML = html;
  }
}

renderTree();
</script>
</body>
</html>
