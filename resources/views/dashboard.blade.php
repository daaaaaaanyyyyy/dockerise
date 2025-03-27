<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Secrets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Create Secret Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center text-gray-800 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Create Secret
                </h2>
                <form action="{{ route('secret.create') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Secret Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter a descriptive title" class="w-full border-gray-300 dark:border-gray-600 dark:bg-white-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 transition duration-150" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                        <textarea name="description" id="description" rows="4" placeholder="Describe what this secret is for" class="w-full border-gray-300 dark:border-gray-600 dark:bg-white-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 transition duration-150" required></textarea>
                    </div>
                    <div>
                        <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Attach File (optional)</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="file" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-white-600 dark:bg-white-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 transition duration-150">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500 dark:text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Drag and drop or click to select</p>
                                </div>
                                <input id="file" type="file" name="file" class="hidden" />
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="px-4 py-2 border border-gray-300 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 dark:bg-red-600 dark:hover:bg-red-700 dark:active:bg-red-800 text-white font-semibold rounded-md shadow-md hover:shadow-lg transition duration-150 flex items-center justify-center space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    <span>Create Secret</span>
</button>

                </form>
            </div>

            <!-- Secrets List Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4 flex items-center text-gray-800 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Secrets List
                </h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left bg-gray-100 dark:bg-gray-700">
                                <th class="py-3 px-4 text-gray-700 dark:text-gray-200">Title</th>
                                <th class="py-3 px-4 text-gray-700 dark:text-gray-200">id</th>
                                <th class="py-3 px-4 text-gray-700 dark:text-gray-200">User</th>
                                <th class="py-3 px-4 text-gray-700 dark:text-gray-200">File</th>
                                <th class="py-3 px-4 text-center text-gray-700 dark:text-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($secrets as $secret)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                                    <td class="py-3 px-4 text-gray-800 dark:text-gray-200">{{ $secret->title }}</td>
                                    <td class="py-3 px-4 text-gray-800 dark:text-gray-200">
                                        <div class="truncate max-w-xs">{{ $secret->id }}</div>
                                    </td>
                                    <td class="py-3 px-4 text-gray-800 dark:text-gray-200">{{ $secret->user->name }}</td>
                                    <td class="py-3 px-4">
                                        @if ($secret->file)
                                            <a href="{{ asset('storage/' . $secret->file) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 flex items-center" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                Download
                                            </a>
                                        @else
                                            <span class="text-gray-500 dark:text-gray-400">No File</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex justify-center space-x-2">
                                            <button onclick="openViewModal({{ $secret }})" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 p-1 rounded-md hover:bg-green-100 dark:hover:bg-green-800 transition duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <button onclick="openEditModal({{ $secret }})" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 p-1 rounded-md hover:bg-blue-100 dark:hover:bg-blue-800 transition duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('secret.delete', $secret->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 p-1 rounded-md hover:bg-red-100 dark:hover:bg-red-800 transition duration-150" onclick="return confirm('Are you sure you want to delete this secret?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
    {{ $secrets->links() }}
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div id="viewModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm flex justify-center items-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Secret Details</h2>
                <button type="button" onclick="closeViewModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 transition duration-150">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Title</h3>
                    <p id="viewTitle" style="color:white;" class="mt-1 text-white-900 dark:text-white font-medium"></p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h3>
                    <p id="viewDescription" style="color:white;" class="mt-1 text-white-100 dark:text-white"></p>
                </div>
                <div id="fileSection">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">File</h3>
                    <div class="mt-1">
                        <a id="viewFile" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-600 dark:hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </a>
                        <p id="noFile" class="text-gray-500 dark:text-gray-400 mt-1 hidden">No file attached</p>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <button type="button" onclick="closeViewModal()" class="w-full px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-md transition-colors duration-150">Close</button>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 backdrop-blur-sm flex justify-center items-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Edit Secret</h2>
                <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 transition duration-150">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="editSecretId" name="id">
                <div>
                    <label for="editTitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Secret Title</label>
                    <input type="text" name="title" id="editTitle" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 transition duration-150" required>
                </div>
                <div>
                    <label for="editDescription" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="editDescription" rows="4" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 transition duration-150" required></textarea>
                </div>
                <div>
                    <label for="editFile" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Replace File (optional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="editFile" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 transition duration-150">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500 dark:text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-sm text-gray-500 dark:text-gray-400" id="currentFileText">Drag and drop or click to select</p>
                            </div>
                            <input id="editFile" type="file" name="file" class="hidden" />
                        </label>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-600 dark:hover:bg-indigo-500 text-white rounded-md shadow hover:shadow-md transition duration-150 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Changes
                    </button>
                    <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-md transition-colors duration-150">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openViewModal(secret) {
            document.getElementById('viewTitle').innerText = secret.title;
            document.getElementById('viewDescription').innerText = secret.description;
            
            const viewFileLink = document.getElementById('viewFile');
            const noFileText = document.getElementById('noFile');
            
            if (secret.file) {
                viewFileLink.href = '/storage/' + secret.file;
                viewFileLink.classList.remove('hidden');
                noFileText.classList.add('hidden');
            } else {
                viewFileLink.classList.add('hidden');
                noFileText.classList.remove('hidden');
            }
            
            document.getElementById('viewModal').classList.remove('hidden');
        }
        
        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }

        function openEditModal(secret) {
            // Set the form action
            document.getElementById('editForm').action = `/secrets/${secret.id}/update`;
            
            // Populate form fields
            document.getElementById('editSecretId').value = secret.id;
            document.getElementById('editTitle').value = secret.title;
            document.getElementById('editDescription').value = secret.description;
            
            // Update file info text
            if (secret.file) {
                document.getElementById('currentFileText').innerText = "Current file: " + secret.file.split('/').pop() + " (Upload to replace)";
            } else {
                document.getElementById('currentFileText').innerText = "No current file (Upload to add)";
            }
            
            // Show the modal
            document.getElementById('editModal').classList.remove('hidden');
        }
        
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-app-layout>