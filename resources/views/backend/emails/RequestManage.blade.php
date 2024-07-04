<x-mail::message>
# Réponse à votre demande de congé

Cher/Chère **{{$details['nom']}} {{$details['prenoms']}}**,

@if ($details['statut'] === 'Approuvé')
    Nous avons le plaisir de vous informer que votre demande de congé a été approuvée. Voici les détails de votre demande :
@elseif ($details['statut'] === 'Rejeté')
    Nous sommes désolés de vous informer que votre demande de congé a été rejetée. Voici les détails de votre demande :
@else

@endif

- **Type de Congé** : {{$details['type_conge']}}
- **Intervalle de temps** : du {{$details['date_debut_conge']}} au {{$details['date_fin_conge']}}
- **Personnel ayant fait la demande** : {{$details['nom']}} {{$details['prenoms']}}
- **Structure** : {{$details['structure']}}

@if ($details['statut'] === 'Approuvé')
    Votre congé a été approuvé et vous pouvez profiter de vos jours de congé en toute tranquillité. Bon congé !
@elseif ($details['statut'] === 'Rejeté')
    Malheureusement, votre demande de congé n'a pas été approuvée. Nous vous invitons à contacter le service des ressources humaines pour plus d'informations. Merci de votre compréhension !
@else

@endif

Cordialement,

*L'équipe des Ressources Humaines*

</x-mail::message>
