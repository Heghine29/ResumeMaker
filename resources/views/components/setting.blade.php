@props(['heading'])
<div class="setting-wrap">
    <div class="d-flex">
        <aside>
            <h4 class="mb-3">Actions</h4>
                <ul class="list-group">
                    <li class="list-group-item {{request()->is('dashboard') ? 'active': ''}}">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li class="list-group-item  {{request()->is('resumes') ? 'active': ''}}">
                        <a href="/resumes">My Resumes</a>
                    </li>
                    <li class="list-group-item  {{request()->is('resume/create') ? 'active': ''}}">
                        <a href="/resume/create">New Resume</a>
                    </li>
                </ul>
        </aside>
        <main>
                {{$slot}}
        </main>
    </div>
</div>
