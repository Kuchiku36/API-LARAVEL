<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Contact Us</h1>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- Prénom -->
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">First name *</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-2.5 text-gray-900 dark:text-gray-100 dark:bg-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <!-- Nom -->
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">Last name *</label>
                            <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    class="block w-full rounded-md border-0 py-2.5 text-gray-900 dark:text-gray-100 dark:bg-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mt-10 space-y-10">
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">Email address *</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email"
                                    class="block w-full rounded-md border-0 py-2.5 text-gray-900 dark:text-gray-100 dark:bg-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <!-- Type de requête -->
                    <div class="mt-10">
                        <fieldset>
                            <legend class="block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">Query Type *</legend>
                            <div class="flex space-x-4 mt-2">
                                <!-- Option 1 -->
                                <div
                                    class="flex-1 flex items-center gap-x-3 rounded-md border dark:border-gray-600 px-3 py-3 text-gray-900 dark:text-gray-100 dark:bg-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 focus-within:ring-2 focus-within:ring-indigo-600">
                                    <input id="push-everything" name="push-notifications" type="radio"
                                        class="h-4 w-4 border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-600">
                                    <label for="push-everything"
                                        class="flex-1 block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">General Enquiry</label>
                                </div>
                                <!-- Option 2 -->
                                <div
                                    class="flex-1 flex items-center gap-x-3 rounded-md border dark:border-gray-600 px-3 py-3 text-gray-900 dark:text-gray-100 dark:bg-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 focus-within:ring-2 focus-within:ring-indigo-600">
                                    <input id="push-email" name="push-notifications" type="radio"
                                        class="h-4 w-4 border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-600">
                                    <label for="push-email"
                                        class="flex-1 block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">Support Request</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Message -->
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-light leading-6 text-gray-900 dark:text-gray-100">Message *</label>
                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 dark:bg-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Consentement -->
                    <div class="mt-10">
                        <fieldset>
                            <div class="flex items-center">
                                <div class="flex items-center gap-x-3">
                                    <input id="comments" name="comments" type="checkbox"
                                        class="h-4 w-4 rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-600">
                                    <div class="text-sm leading-6">
                                        <p class="text-gray-500 dark:text-gray-400">I consent to being contacted by the team *</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
