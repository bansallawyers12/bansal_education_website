@extends('email.layouts.app')

@section('title', 'Compose')
@section('heading', 'Compose Email')

@section('content')
    <div class="mx-auto max-w-4xl">
        <form action="{{ $draft ? route('email.emails.compose.update', $draft) : route('email.emails.compose.store') }}" method="POST" id="compose-form" class="space-y-6">
            @csrf
            @if($draft) @method('PUT') @endif

            {{-- From: SendGrid verified senders --}}
            <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-4 sm:p-6">
                <label class="block text-sm font-medium text-slate-400">From</label>
                <select name="from_address" id="from_address" required class="mt-1.5 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-slate-200 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 sm:text-sm">
                    @foreach($senders as $sender)
                        <option value="{{ $sender['email'] }}" data-name="{{ $sender['name'] }}" {{ ($draft?->from_address ?? $senders[0]['email'] ?? '') === $sender['email'] ? 'selected' : '' }}>
                            {{ $sender['label'] }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="from_name" id="from_name" value="{{ $draft?->from_name ?? ($senders[0]['name'] ?? '') }}">
                <p class="mt-1 text-xs text-slate-500">Verified senders from your SendGrid account</p>
            </div>

            {{-- To --}}
            <div>
                <label for="to_address" class="block text-sm font-medium text-slate-400">To</label>
                <input type="email" name="to_address" id="to_address" required value="{{ old('to_address', $draft?->to_address ?? '') }}" class="mt-1.5 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-slate-200 placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 sm:text-sm" placeholder="recipient@example.com">
            </div>

            {{-- Subject --}}
            <div>
                <label for="subject" class="block text-sm font-medium text-slate-400">Subject</label>
                <input type="text" name="subject" id="subject" required value="{{ old('subject', $draft?->subject ?? '') }}" class="mt-1.5 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-slate-200 placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 sm:text-sm" placeholder="Email subject">
            </div>

            {{-- Template --}}
            <div class="rounded-xl border border-slate-800 bg-slate-900/50 p-4 sm:p-6">
                <label class="block text-sm font-medium text-slate-400">Email Template</label>
                <div class="mt-2 flex flex-wrap gap-2">
                    <select id="template_select" class="rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="">-- Select template --</option>
                        @foreach($templates as $tpl)
                            <option value="{{ $tpl->id }}" data-subject="{{ e($tpl->subject) }}" data-html="{{ e($tpl->body_html) }}" data-text="{{ e($tpl->body_text) }}">{{ $tpl->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="apply_template" class="rounded-lg bg-slate-700 px-3 py-2 text-sm font-medium text-slate-200 hover:bg-slate-600">Apply template</button>
                    <button type="button" id="clear_template" class="rounded-lg border border-slate-600 px-3 py-2 text-sm font-medium text-slate-400 hover:bg-slate-800">Clear</button>
                </div>
                <div class="mt-4 flex flex-wrap items-end gap-2 border-t border-slate-700 pt-4">
                    <div>
                        <label for="template_name" class="block text-xs text-slate-500">Save current as template</label>
                        <input type="text" id="template_name" placeholder="Template name" class="mt-1 rounded-lg border border-slate-700 bg-slate-800 px-3 py-1.5 text-sm text-slate-200 w-48">
                    </div>
                    <button type="button" id="save-template-btn" class="rounded-lg bg-emerald-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-emerald-600 self-end">Save as template</button>
                </div>
                <p class="mt-1 text-xs text-slate-500">Select a template to load, or save current content as a new template</p>
            </div>

            {{-- Body --}}
            <div>
                <div class="flex items-center justify-between">
                    <label for="body_html" class="block text-sm font-medium text-slate-400">Body</label>
                    <span class="text-xs text-slate-500">HTML supported</span>
                </div>
                <textarea name="body_html" id="body_html" rows="12" class="mt-1.5 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 font-mono text-sm text-slate-200 placeholder-slate-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="<p>Hello,</p><p>Your email content here...</p>">{{ old('body_html', $draft?->body_html ?? '') }}</textarea>
                <input type="hidden" name="body_text" id="body_text" value="{{ old('body_text', $draft?->body_text ?? '') }}">
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap gap-3 border-t border-slate-800 pt-6">
                <button type="submit" name="action" value="draft" class="inline-flex items-center gap-2 rounded-lg border border-slate-600 bg-slate-800 px-4 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                    Save draft
                </button>
                <button type="button" id="send-now-btn" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-500 disabled:opacity-50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Send now
                </button>
                <button type="submit" name="action" value="send" class="inline-flex items-center gap-2 rounded-lg border border-slate-600 bg-slate-800 px-4 py-2.5 text-sm font-medium text-slate-300 hover:bg-slate-700">
                    Save & move to Outbox
                </button>
                <a href="{{ route('email.emails.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-600 px-4 py-2.5 text-sm font-medium text-slate-400 hover:bg-slate-800">
                    Cancel
                </a>
            </div>
        </form>

        {{-- Drafts --}}
        @php $drafts = \App\Models\OutboundEmail::where('status', \App\Models\OutboundEmail::STATUS_DRAFT)->latest()->take(5)->get(); @endphp
        @if($drafts->isNotEmpty())
            <div class="mt-10 rounded-xl border border-slate-800 bg-slate-900/50 p-4">
                <h3 class="text-sm font-medium text-slate-400">Recent drafts</h3>
                <ul class="mt-2 space-y-1.5">
                    @foreach($drafts as $d)
                        <li>
                            <a href="{{ route('email.emails.compose', ['draft' => $d->id]) }}" class="text-sm text-blue-400 hover:text-blue-300">
                                {{ Str::limit($d->subject ?: '(no subject)', 50) }}
                            </a>
                            <span class="text-xs text-slate-500">— {{ $d->updated_at->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fromSelect = document.getElementById('from_address');
            const fromName = document.getElementById('from_name');
            const composeForm = document.getElementById('compose-form');

            // Sync from_name and body_text before any submit
            function syncForm() {
                const opt = fromSelect?.options[fromSelect?.selectedIndex];
                if (opt && fromName) fromName.value = opt.dataset?.name || '';
                const bodyHtmlEl = document.getElementById('body_html');
                const bodyTextEl = document.getElementById('body_text');
                if (bodyHtmlEl && bodyTextEl) bodyTextEl.value = bodyHtmlEl.value?.replace(/<[^>]*>/g, '') || bodyHtmlEl.value || '';
            }
            composeForm?.addEventListener('submit', syncForm);

            // Send now via AJAX to capture exact error
            document.getElementById('send-now-btn')?.addEventListener('click', async function() {
                const btn = this;
                syncForm();
                if (!composeForm?.checkValidity()) {
                    composeForm.reportValidity();
                    return;
                }
                btn.disabled = true;
                btn.textContent = 'Sending...';
                const formData = new FormData(composeForm);
                formData.set('action', 'send_now');
                formData.append('_method', composeForm.querySelector('[name="_method"]')?.value || 'POST');
                try {
                    const url = composeForm.getAttribute('action'); // use getAttribute: form.action is shadowed by buttons with name="action"
                    const method = (formData.get('_method') || 'POST').toUpperCase();
                    const res = await fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    const text = await res.text();
                    let data = {};
                    try { data = JSON.parse(text); } catch (e) { data = {}; }
                    if (data.success && data.redirect) {
                        window.location.href = data.redirect;
                        return;
                    }
                    let errMsg = data.error || data.message || '';
                    if (data.errors && typeof data.errors === 'object') {
                        errMsg = Object.values(data.errors).flat().join(' ');
                    }
                    if (errMsg) {
                        alert('Error: ' + errMsg);
                    } else if (!res.ok) {
                        alert('Server error ' + res.status + '. Check storage/logs/laravel.log');
                    }
                } catch (err) {
                    alert('Network error: ' + (err.message || 'Could not connect. Check console.'));
                    console.error(err);
                } finally {
                    btn.disabled = false;
                    btn.innerHTML = '<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg> Send now';
                }
            });
            const templateSelect = document.getElementById('template_select');
            const applyBtn = document.getElementById('apply_template');
            const clearBtn = document.getElementById('clear_template');
            const subjectInput = document.getElementById('subject');
            const bodyHtml = document.getElementById('body_html');

            fromSelect?.addEventListener('change', function() {
                const opt = this.options[this.selectedIndex];
                fromName.value = opt?.dataset?.name || '';
            });

            applyBtn?.addEventListener('click', function() {
                const opt = templateSelect.options[templateSelect.selectedIndex];
                if (opt && opt.value) {
                    subjectInput.value = opt.dataset.subject || '';
                    bodyHtml.value = opt.dataset.html || opt.dataset.text || '';
                }
            });

            clearBtn?.addEventListener('click', function() {
                templateSelect.selectedIndex = 0;
                subjectInput.value = '';
                bodyHtml.value = '';
            });

            document.getElementById('save-template-btn')?.addEventListener('click', async function() {
                const nameInput = document.getElementById('template_name');
                const name = nameInput?.value?.trim();
                if (!name) { nameInput?.focus(); alert('Enter a template name.'); return; }
                const fd = new FormData();
                fd.append('_token', document.querySelector('input[name="_token"]')?.value || '');
                fd.append('name', name);
                fd.append('subject', subjectInput?.value || '');
                fd.append('body_html', bodyHtml?.value || '');
                fd.append('body_text', bodyHtml?.value?.replace(/<[^>]*>/g, '') || '');
                try {
                    const r = await fetch('{{ route("email.emails.templates.store") }}', { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                    if (r.ok) { alert('Template saved.'); nameInput.value = ''; } else { const d = await r.json().catch(() => ({})); alert(d.message || 'Failed to save template.'); }
                } catch (e) { alert('Error: ' + (e.message || 'Could not save')); }
            });
        });
    </script>
    @endpush
@endsection
