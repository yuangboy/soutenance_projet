<?php
// app/Policies/ConversationPolicy.php
namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Conversation $conversation)
    {
        return $user->id === $conversation->praticien_id || $user->id === $conversation->patient_id;
    }
}
