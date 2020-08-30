<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-size-33">
        <edit-profile-form data-background-color="red"> </edit-profile-form>
      </div>
    </div>
  </div>
</template>

<script>
import { EditProfileForm } from "@/components";

export default {
  components: {
    EditProfileForm
  }
};
</script>
