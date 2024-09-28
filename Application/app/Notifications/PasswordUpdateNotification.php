<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordUpdateNotification extends Notification
{
    use Queueable;

    protected User $user;
    protected $lines = [
        'Estamos entrando em contato para informar que sua senha foi alterada com sucesso.',
        'Caso você não tenha alterado sua senha sugerimos que faça uma verificação de vírus',
        'e que entre em contato com o suporte.',

    ];
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Alteração de Senha')
                    ->greeting('Olá, ' . $this->user->nomeusu)
                    ->line('Acabamos de redefinir a usa senha, e para todo o caso devemos avisar:')
                    ->lines($this->lines)
                    ->action('Fazer Login', url(route('login')))
                    ->salutation('Muito obrigado por sua confiança a equipe VirtualEduc agradece o apoio! :)');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
