<x-app-layout>
  <div class="space-y-8">
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
  </div>
</x-app-layout>