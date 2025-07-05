<x-filament-panels::page>
    @if (count($headerWidgets = $this->getHeaderWidgets()))
    <x-filament-panels::widgets
        :widgets="$headerWidgets"
        :columns="$this->getColumns()"
        class="col-span-full mb-6" />
    @endif

    <div class="space-y-6">
        @if (count($widgets = $this->getWidgets()))
        <x-filament-panels::widgets
            :widgets="$widgets"
            :columns="$this->getColumns()" />
        @endif

        {{-- Your custom sections remain unchanged --}}
        <div class="grid gap-6 md:grid-cols-2">
            {{-- Recent Activity --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    @foreach(\App\Models\Activity::latest()->take(5)->get() as $activity)
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 bg-gray-100 p-2 rounded-full">
                            <x-heroicon-o-bell class="h-5 w-5 text-gray-500" />
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $activity->description }}</p>
                            <p class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-2 gap-4">
                    <x-filament::button
                        icon="heroicon-o-plus"
                        color="gray"
                        tag="a"
                        href="{{ route('filament.admin.resources.users.create') }}">
                        Add User
                    </x-filament::button>
                    <x-filament::button
                        icon="heroicon-o-cog"
                        color="gray"
                        tag="a"
                        href="{{ route('filament.admin.pages.settings') }}">
                        Settings
                    </x-filament::button>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>