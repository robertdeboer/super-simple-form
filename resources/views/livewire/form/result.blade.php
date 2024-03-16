<div>
    <h3>Personal Information</h3>
    <ul>
        <li>First Name: {{ $user['firstName'] ?? '' }}</li>
        <li>Last Name: {{ $user['lastName'] ?? '' }}</li>
        <li>Address: {{ $user['address'] ?? '' }}</li>
        <li>City: {{ $user['city'] ?? '' }}</li>
        <li>Country: {{ $user['country'] ?? '' }}</li>
        <li>Date of Birth: {{ $user['dateOfBirth']  ?? '' }}</li>
    </ul>
    <h3>Marriage Information</h3>
    <ul>
        <li>Is Married: {{ $marriage['isMarried'] ?? '' }}</li>
        <li>Country of Marriage: {{ $marriage['country'] ?? 'N/A' }}</li>
        <li>Date of Marriage: {{ $marriage['dateOfMarriage'] ?? 'N/A' }}</li>
        <li>Is Widowed: {{ $marriage['isWidowed'] ?? '' }}</li>
        <li>Was Previously Married: {{ $marriage['wasMarried'] ?? '' }}</li>
    </ul>
    <button wire:click="clear">Try Again</button>
</div>
