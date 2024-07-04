<x-mail::message>
# Nouvelle Demande de congé

Une nouvelle demande a été faite. Voici les détails de la demande :

Détails de la demande

- Nom : {{$details['nom']}}
- Prénoms : {{$details['prenoms']}}
- Motif : {{$details['motif']}}
- Période de congé : {{$details['periode_conge']}} jours
- Date début de congé : {{$details['date_debut_conge']}}
- Date fin de congé : {{$details['date_fin_conge']}}
- Type de congé : {{$details['type_conge']}}

</x-mail::message>
